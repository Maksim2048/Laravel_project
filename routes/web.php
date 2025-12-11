<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/building', [BuildingController::class, 'index']);
Route::get('/building/{id}', [BuildingController::class, 'show']);
Route::post('/room', [RoomController::class, 'store']);
Route::get('/room', [RoomController::class, 'index']);
Route::get('/room/create', [RoomController::class, 'create']);
Route::get('/room/edit/{id}', [RoomController::class, 'edit']);
Route::post('/room/update/{id}', [RoomController::class, 'update']);
Route::get('/room/{id}', [RoomController::class, 'show']);
Route::get('/room/destroy/{id}', [RoomController::class, 'destroy']);


