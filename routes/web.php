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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index');
Route::get('/about', function () {
    return view('about');
});

Route::get('/library', 'LibraryController@index')->name('home');
Route::get('/library/orderby=bestsellers_rank', 'LibraryController@bestsellers_rank')->name('home');
Route::get('/library/orderby=publication_date', 'LibraryController@publication_date')->name('home');
Route::get('/library/orderby=id', 'LibraryController@id')->name('home');

Route::get('/search', 'LibraryController@search')->name('search');

Route::get('/book/{id}', 'BookController@index')->name('book');

Route::get('/category/{id}', 'CategoryController@index')->name('category');

Route::get('/author/{id}', 'AuthorController@index')->name('author');

Route::get('/categories', 'CategoriesController@index')->name('categories');

Route::get('/authors', 'AuthorsController@index')->name('authors');
Route::get('/authors/search', 'AuthorsController@search');
Route::get('/authors/src', 'AuthorsController@src');

//ADMIN ROUTES:
Route::get('/admin', 'AdminController@index')->name('admin');
Route::post('/admin/AddANewBook', 'AdminController@addanewbook');
Route::post('/admin/CreateAnAuthor', 'AdminController@createanauthor');
Route::post('/admin/DeleteAnAuthor', 'AdminController@deleteanauthor');
Route::post('/admin/DeleteABook', 'AdminController@deleteabook');
Route::post('/admin/DeleteAUser', 'AdminController@deleteauser');

//CART
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/AddToCart', 'BookController@addtocart');
Route::get('/cart/RemoveFromCart/{id}', 'BookController@removefromcart');