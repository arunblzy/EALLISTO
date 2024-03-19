<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth', 'as' => 'admin.'], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('customers', CustomerController::class)->except(['store', 'update', 'destroy', 'show']);
    Route::resource('invoices', InvoiceController::class)->except(['store', 'update', 'destroy', 'show']);
});
Auth::routes();
