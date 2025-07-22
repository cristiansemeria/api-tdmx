<?php

use App\Http\Controllers\DestinoController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ServicioCategoriaController;
use App\Http\Controllers\ServicioSubcategoriaController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TourController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('destinos', DestinoController::class);
Route::apiResource('hotel', HotelController::class);
Route::apiResource('tour', TourController::class);
Route::apiResource('categoria', ServicioCategoriaController::class);
Route::apiResource('subcategoria', ServicioSubcategoriaController::class);
Route::apiResource('team', TeamController::class);
