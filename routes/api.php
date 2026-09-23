<?php

use App\Http\Controllers\BuildingControllerApi;
use App\Http\Controllers\RoomControllerApi;
use App\Http\Controllers\GuestControllerApi;
use Illuminate\Support\Facades\Route;

Route::get('/buildings', [BuildingControllerApi::class, 'index']);
Route::get('/buildings/{id}', [BuildingControllerApi::class, 'show']);

Route::get('/rooms', [RoomControllerApi::class, 'index']);
Route::get('/rooms/{id}', [RoomControllerApi::class, 'show']);

Route::get('/guests', [GuestControllerApi::class, 'index']);
Route::get('/guests/{id}', [GuestControllerApi::class, 'show']);