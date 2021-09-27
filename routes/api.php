<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Response;

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

Route::post('/signin', [AuthenticationController::class, 'signin'])->name('signin');
Route::post('/signout', [AuthenticationController::class, 'signout'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/pedidos', [AuthenticationController::class, 'pedidos']);
Route::post('/proveedores', [AuthenticationController::class, 'proveedores']);
Route::get('/pedidosAll', [AuthenticationController::class, 'pedidosAll']);




