<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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
});

Route::get('/addBook',[BookController::class, 'addBook'])->name('addBook');

Route::post('/storeBook',[BookController::class, 'store'])->name('book.store');

Route::get('/books',[BookController::class, 'books'])->name('allBooks');

Route::get('/editBook/{id}',[BookController::class, 'editBook'])->name('book.edit');

Route::post('/updateBook',[BookController::class, 'updateBook'])->name('book.update');

Route::get('/deleteBook/{id}',[BookController::class, 'deleteBook'])->name('book.delete');

