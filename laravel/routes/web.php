<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home.index');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(BooksController::class)->group(function () {

    Route::get('/admin/books/all', 'BooksAll')->name('books.all');
    Route::get('/admin/books/add', 'BooksAdd')->name('books.add');
    Route::post('/admin/books/store', 'BooksStore')->name('books.store');
    Route::get('/admin/books/edit/{id}', 'BooksEdit')->name('books.edit');
    Route::post('/admin/books/update', 'BooksUpdate')->name('books.update');
    Route::get('/admin/books/delete/{id}', 'BooksDelete')->name('books.delete');
});


//Rout Card

Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');


// Route invoices
Route::get('generate-invoice-pdf', array('as'=> 'generate.invoice.pdf', 'uses' => 'PDFController@generateInvoicePDF'));

Route::get('create_payment/{total}', [PaymentController::class, 'create_payment'])->name('payment.create');
Route::post('handle_payment', [PaymentController::class, 'handle_payment']);

