<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('product')->group(function () {
    Route::get('', [ProductController::class, 'index']);
    Route::get('{id}', [ProductController::class, 'show']);
});

Route::prefix('cart')->group(function () {
    Route::post('', [ProductController::class, 'storeCart']);
    Route::get('', [ProductController::class, 'indexCart']);
    Route::delete('{id}', [ProductController::class, 'deleteCart']);
});

Route::prefix('transaction')->group(function () {
    Route::get('', [TransactionController::class, 'index']);
    Route::post('', [TransactionController::class, 'store']);
    Route::get('{id}', [TransactionController::class, 'show']);
});
