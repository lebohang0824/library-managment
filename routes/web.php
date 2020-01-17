<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| // dionmabuza25@gmail.com
*/

Auth::routes(['verify' => true]);

// Home
Route::view('/', 'pages.home')->middleware('account.verified');

// Authentication
Route::view('/login', 'pages.auth.login')->middleware('guest')->name('login');
Route::post('/login', 'AuthController@postLogin');

Route::view('/register', 'pages.auth.register')->middleware('guest');
Route::post('/register', 'AuthController@postRegister');

// Get a book
Route::group(['prefix' => '/', 'middleware' => 'account.verified'],function () {
	Route::view('/books', 'pages.books');
	Route::get('/books/all', 'BooksController@getBooks');
	Route::get('/books/{ref}', 'BooksController@getBook');

	Route::group(['prefix' => '/'],function () {
		Route::get('/my-books', 'BooksController@getMyBooks');
		Route::post('/books/return', 'BooksController@postReturnBook');
		Route::post('/books/borrow', 'BooksController@postBorrowBook');
		Route::post('/book/register', 'BooksController@postRegisterBook');
	});
});

// Get book comments
Route::get('/books/{ref}/comments', 'CommentsController@getBookComments');

// Get account
Route::view('/account', 'pages.account')->middleware('account.verified');

// Contact us
Route::view('/contact', 'pages.contact');

// Logout
Route::post('/logout', 'AuthController@postLogout');


Route::get('mail', 'AuthController@mail');