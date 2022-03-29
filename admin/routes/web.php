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

Route::get('/', 'dashboardController@index')->name("dashboard");

Auth::routes(["register" => false]);
Route::get("products/{id}/gallery", "ProductController@gallery")->name("products.gallery");
Route::resource('products', 'ProductController');
Route::resource('product-galleries', "ProductGalleryController");
