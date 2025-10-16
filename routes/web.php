<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/building', [BuildingController::class, 'index']);
Route::get('/building/{id}', [BuildingController::class, 'show']);
Route::get('/room', [RoomController::class, 'index']);
Route::get('/room/{id}', [RoomController::class, 'show']);
