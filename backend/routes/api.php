<?php

use App\Http\Controllers\BuildingControllerApi;
use App\Http\Controllers\RoomControllerApi;
use App\Http\Controllers\GuestControllerApi;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;


Route::post('/login', [AuthController::class, 'login']);

Route::get('/buildings', [BuildingControllerApi::class, 'index']);
Route::get('/buildings/total', [BuildingControllerApi::class, 'total']);
Route::get('/buildings/{id}', [BuildingControllerApi::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/rooms', [RoomControllerApi::class, 'index']);
    Route::get('/rooms/total', [RoomControllerApi::class, 'total']);
    Route::get('/rooms/{id}', [RoomControllerApi::class, 'show']);

    Route::get('/guests', [GuestControllerApi::class, 'index']);
    Route::get('/guests/total', [GuestControllerApi::class, 'total']);
    Route::get('/guests/{id}', [GuestControllerApi::class, 'show']);

    Route::get('/user', function (Request $request) {return $request->user();});

    Route::get('/logout', [AuthController::class, 'logout']);
});