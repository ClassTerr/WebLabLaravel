<?php

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

Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/book/{id}', 'BookController@index')->name('book');
Route::get('/books', 'BooksController@index')->name('books');
Route::get('/books/manage', 'BooksController@manage')->name('books/manage');
Route::get('/books/addbook', 'BooksController@create')->name('books/addbook');
