<?php

use App\Http\Controllers\CheckController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;





Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    
    
    // List all invoices
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    
    // Generate invoice PDF
    Route::get('/invoices/generate/{id}', [InvoiceController::class, 'generateInvoice'])->name('invoices.generate');
    
    // Show the form to create an invoice
    Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
    
    // Store the newly created invoice
    Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::delete('/invoices/delete/{id}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
    
    
    
    
    // Clients Routes
    Route::resource('clients', ClientController::class);
    
    // Products Routes
    Route::resource('products', ProductController::class);
    
    Route::get('/', [CheckController::class, 'home'])->name('dashboard.index');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
