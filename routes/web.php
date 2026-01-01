<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello world!']);
});

Route::get('/buildings', [BuildingController::class, 'index']);
Route::get('/rooms', [RoomController::class, 'index']);

Route::get('/building/{id}', [BuildingController::class, 'show']);
Route::get('/room/{id}', [RoomController::class, 'show']);

Route::get('/guests', [GuestController::class, 'index']);
Route::get('/guest/{id}', [GuestController::class, 'show']);
