<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\StripeController;
use App\Http\Controllers\StripeController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/v1/balance', [StripeController::class, 'balance']);
Route::post('/v1/payouts', [StripeController::class, 'payouts']);
Route::get('/v1/charges', [StripeController::class, 'getcharges']);
Route::post('/v1/charges', [StripeController::class, 'charges']);
Route::post('/v1/payment_methods', [StripeController::class, 'payment_methods']);
Route::post('/v1/payment_intents', [StripeController::class, 'payment_intents']);
