<?php

use App\Http\Controllers\BuildingControllerApi;
use App\Http\Controllers\RoomControllerApi;
use App\Http\Controllers\GuestControllerApi;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/rooms', [RoomControllerApi::class, 'index']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/logout', [AuthController::class, 'logout']);

});

Route::get('/buildings', [BuildingControllerApi::class, 'index']);
Route::get('/buildings/{id}', [BuildingControllerApi::class, 'show']);

Route::get('/rooms/{id}', [RoomControllerApi::class, 'show']);

Route::get('/guests', [GuestControllerApi::class, 'index']);
Route::get('/guests/{id}', [GuestControllerApi::class, 'show']);
