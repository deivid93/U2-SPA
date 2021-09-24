<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

/*Auth::routes();
Route::get('/{any}',  [App\Http\Controllers\HomeController::class, 'index'])->where('any', '.*');
Route::post('login',  [App\Http\Controllers\Auth\LoginController::class, 'login']); 
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::post('registro', [App\Http\Controllers\Auth\RegisterController::class, 'register']);*/

Route::get('/{any}', [App\Http\Controllers\SpaController::class, 'index'])->where('any', '.*');
