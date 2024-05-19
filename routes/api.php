<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\SaleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('customers', [CustomerController::class, 'index']);
Route::get('customers/{id}', [CustomerController::class, 'show']);
Route::post('customers', [CustomerController::class, 'store']);
Route::put('customers/{id}', [CustomerController::class, 'update']);
Route::delete('customers/{id}', [CustomerController::class, 'delete']);

Route::get('interactions', [InteractionController::class, 'index']);
Route::get('interactions/{id}', [InteractionController::class, 'show']);
Route::post('interactions', [InteractionController::class, 'store']);
Route::put('interactions/{id}', [InteractionController::class, 'update']);
Route::delete('interactions/{id}', [InteractionController::class, 'delete']);

Route::get('sales', [SaleController::class, 'index']);
Route::get('sales/{id}/invoice', [SaleController::class, 'invoices'])->name('sales.downloadInvoice');
Route::get('sales/{id}', [SaleController::class, 'show']);
Route::post('sales', [SaleController::class, 'store']);
Route::put('sales/{id}', [SaleController::class, 'update']);
Route::delete('sales/{id}', [SaleController::class, 'delete']);

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
