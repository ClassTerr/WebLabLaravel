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

Route::get('', 'HomeController@index')->name('home');


Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('books/manage', 'BooksController@manage')->name('books/manage')->middleware("is-admin");

Route::resource('books', 'BooksController')->except([
    'index', 'show'
])->middleware("is-admin");

Route::resource('books', 'BooksController')->only([
    'index', 'show'
])->middleware("auth");

/*
Route::get('/books/{id}', 'BookController@index')->name('book');
Route::get('/books/manage', 'BooksController@manage')->name('books/manage');
Route::post('/books/add', 'BooksController@add')->name('books/add');
Route::post('/books/{id}/edit', 'BooksController@edit')->name('books/edit');
Route::post('/books/{id}/delete', 'BooksController@delete')->name('books/delete');*/
