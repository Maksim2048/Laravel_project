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
Route::get('/room/create', [RoomController::class, 'create']);
//Route::get('/room/{id}', [RoomController::class, 'store']);
//Route::get('/room/{id}', [RoomController::class, 'edit']);
//Route::get('/room/{id}', [RoomController::class, 'update']);
//Route::get('/room/{id}', [RoomController::class, 'destroy']);
