<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello world!']);
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/auth', [LoginController::class, 'authenticate']);

Route::middleware('auth')->group(function () {

    Route::get('/buildings', [BuildingController::class, 'index']);
    Route::get('/building/{id}', [BuildingController::class, 'show']);

    Route::get('/rooms', [RoomController::class, 'index']);
    Route::get('/room/create', [RoomController::class, 'create']);
    Route::post('/room', [RoomController::class, 'store']);
    Route::get('/room/edit/{id}', [RoomController::class, 'edit']);
    Route::post('/room/update/{id}', [RoomController::class, 'update']);
    Route::get('/room/destroy/{id}', [RoomController::class, 'destroy']);
    Route::get('/room/{id}', [RoomController::class, 'show']);

    Route::get('/guests', [GuestController::class, 'index']);
    Route::get('/guest/{id}', [GuestController::class, 'show']);

});

Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});
