<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Product;
use Carbon\Carbon;
use LaravelDaily\Invoices\Invoice as PdfInvoice;
use LaravelDaily\Invoices\Classes\Party;
use App\Models\InvoiceItem;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Invoice::query();

        // Search by reference number
        if ($request->has('search')) {
            $query->where('reference_number', 'like', '%' . $request->search . '%');
        }

        $invoices = $query->paginate(50); // Paginate with 10 items per page
        return view('invoices.index', compact('invoices'));
    }
    public function generateInvoice($id)
    {
        $invoice = Invoice::with(['client', 'items.product.category'])->findOrFail($id);
        $invoiceDate1 = \Carbon\Carbon::parse($invoice->invoice_date)->format('d/m/Y');
    
        // Buyer (Client)
        $buyer = new \LaravelDaily\Invoices\Classes\Party([
            'name' => $invoice->client->name,
            'email' => $invoice->client->email,
            'custom_fields' => [
                'client id' => $invoice->client->id,
            ],
            'object' => $invoice->object,
            'numref' => $invoice->reference_number,
            'responsable' => $invoice->responsable,
            'date' => $invoiceDate1,
        ]);
    
        $invoiceDate = \Carbon\Carbon::parse($invoice->invoice_date);
    
        // Group items by category
        $groupedItems = [];
        foreach ($invoice->items as $item) {
            // Force valid numeric values
            $quantity = (float) ($item->quantity ?? 1); // Default to 1 if null
            $unitPrice = (float) ($item->unit_price ?? 0.0); // Default to 0 if null
            
            $categoryName = $item->product->category->name ?? 'Non catégorisé';
            
            $groupedItems[$categoryName][] = \LaravelDaily\Invoices\Classes\InvoiceItem::make($item->product->name)
                ->pricePerUnit($unitPrice)
                ->quantity($quantity);
        }
    
        // Generate PDF Invoice
        $pdfInvoice = \LaravelDaily\Invoices\Invoice::make('invoice')
            ->series('INV')
            ->status(__('invoices::invoice.paid'))
            ->sequence($invoice->id)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->buyer($buyer)
            ->date($invoiceDate)
            ->dateFormat('m/d/Y')
            ->payUntilDays(14)
            ->currencySymbol('$')
            ->currencyCode('USD')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->notes('Thank you for your business!')
            ->logo(public_path('vendor/invoices/sample-logo.png'));
    
        // Add grouped items to the invoice
        foreach ($groupedItems as $categoryName => $items) {
            // Add category header (with quantity=0 to avoid PricingService errors)
            $pdfInvoice->addItem(
                \LaravelDaily\Invoices\Classes\InvoiceItem::make($categoryName)
                    ->title($categoryName)
                    ->pricePerUnit(0)
                    ->quantity(0)
            );
    
            // Add products under the category
            foreach ($items as $item) {
                $pdfInvoice->addItem($item);
            }
        }
    
        // Stream the invoice to the browser
        return $pdfInvoice->stream();
    }
    public function create()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('invoices.create', compact('clients', 'products'));
    }

    /**
     * Store a newly created invoice in the database.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'invoice_date' => 'required|date',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'object' => 'required|string|max:255', // Validate object
            'responsable' => 'required|string|max:255', // Validate responsable
            'reference_number' => 'required|string|unique:invoices,reference_number',
        ]);

        // Calculate the total amount
        $totalAmount = 0;
        foreach ($request->items as $item) {
            $product = Product::find($item['product_id']);
            $totalAmount += $product->price * $item['quantity'];
        }

        // Create the invoice
        $invoice = new Invoice([
            'reference_number' => $request->reference_number,
            'client_id' => $request->client_id,
            'invoice_date' => Carbon::parse($request->invoice_date),
            'total_amount' => $totalAmount,
            'object' => $request->object, // Add object
            'responsable' => $request->responsable, // Add responsable
        ]);
        $invoice->save(); // Save the invoice to the database

        // Create invoice items
        foreach ($request->items as $item) {
            $product = Product::find($item['product_id']);
            $invoiceItem = new InvoiceItem([
                'invoice_id' => $invoice->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $product->price,
                'total_price' => $product->price * $item['quantity'],
            ]);
            $invoiceItem->save(); // Save the invoice item to the database
        }

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
    }
    public function destroy($id)
    {
        // Delete the invoice
        $invoice = Invoice::find($id);
        $invoice->delete();

        // Redirect with a success message
        return redirect()->route('invoices.index')->with('success', 'Facture supprimée avec succès.');
    }
}
