<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function(){
    Route::post('login', [App\Http\Controllers\LoginController::class, 'login']);
    
});

Route::middleware("auth:api")->group(function(){
    Route::prefix('v1')->group(function () {
        Route::get('get/detail', [App\Http\Controllers\LoginController::class, 'getDetails']);
        Route::get('my-orders', [App\Http\Controllers\OrderController::class, 'orderList']);
        Route::post('customer/support/store', [App\Http\Controllers\LoginController::class, 'storeCustomerSupport']);
        Route::match(array('GET', 'POST'), 'customer/support/message', [App\Http\Controllers\CustomerSupportController::class, 'adminsupportReply']);

    });
});
