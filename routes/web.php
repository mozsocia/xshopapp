<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return redirect()->route('customers.index');
});

// routes/web.php

// List Customers
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

// Show Create Customer Form
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');

// Store Customer
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');

// Show Customer Details
Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');

// Show Edit Customer Form
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');

// Update Customer
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');

// Delete Customer
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');

Route::get('customers/{customer}/send-email', [CustomerController::class, 'sendEmailForm'])->name('customers.sendEmailForm');
Route::post('customers/{customer}/send-email', [CustomerController::class, 'sendEmail'])->name('customers.sendEmail');
