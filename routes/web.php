<?php

use Illuminate\Support\Facades\Route;


Route::get('/{any}', [App\Http\Controllers\SpaController::class, 'index'])->where('any', '.*');
Route::get('{any}', function () {
    return view('spa');
})->where('any', '.*');
