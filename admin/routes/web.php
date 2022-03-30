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

use Illuminate\Support\Facades\Auth;

Route::get('/', 'dashboardController@index')->name("dashboard")->middleware('auth');

Auth::routes(["register" => false]);
Route::get("products/{id}/gallery", "ProductController@gallery")->name("products.gallery")->middleware('auth');
Route::resource('products', 'ProductController')->middleware('auth');
Route::resource('product-galleries', "ProductGalleryController")->middleware('auth');
Route::get("transaction/{id}/set-status", "TransactionController@setStatus")->name("transactions.status")->middleware('auth');
Route::resource('transactions', "TransactionController")->middleware('auth');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
