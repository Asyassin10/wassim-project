<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Product;
use App\Models\Invoice;

class CheckController extends Controller
{


    public function home(){
        $clientCount = Client::count();
        $productCount = Product::count();
        $invoiceCount = Invoice::count();

        return view('dashboard.index', compact('clientCount', 'productCount', 'invoiceCount'));
    }
    // Check if a client exists
    public function checkClient(Request $request)
    {
        $request->validate([
            'client_id' => 'required|integer|exists:clients,id',
        ]);

        $client = Client::find($request->client_id);
        return response()->json([
            'exists' => true,
            'client' => $client,
        ]);
    }

    // Check if a product exists
    public function checkProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $product = Product::find($request->product_id);
        return response()->json([
            'exists' => true,
            'product' => $product,
        ]);
    }

    // Check if an invoice exists
    public function checkInvoice(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|integer|exists:invoices,id',
        ]);

        $invoice = Invoice::with(['client', 'items.product'])->find($request->invoice_id);
        return response()->json([
            'exists' => true,
            'invoice' => $invoice,
        ]);
    }
}