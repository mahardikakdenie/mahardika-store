<?php

use Illuminate\Http\Request;
use Modules\Product\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/product', function (Request $request) {
    return $request->user();
});

Route::prefix('product')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'store']);
    Route::post('{id}', [ProductController::class, 'show']);
    Route::put('{id}', [ProductController::class, 'update']);
    Route::delete('{id}', [ProductController::class, 'destroy']);
});
