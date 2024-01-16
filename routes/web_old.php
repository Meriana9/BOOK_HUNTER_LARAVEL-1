<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.home');
})->name('pages.home');

Route::get('/books', function () {
    return view('books.index');
})->name('books.index');

Route::get('/books/{book}/{slug}', function (\App\Models\Book $book) {
    return view('books.show', compact('book'));
})->name('books.show');

Route::get('/authors', function () {
    return view('authors.index');
})->name('authors.index');

Route::get('/authors/{author}/{slug}', function (\App\Models\Author $author) {
    return view('authors.show', compact('author'));
})->name('authors.show');
