<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThingController;
use App\Http\Controllers\ThingFoundController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('things', ThingController::class);

Route::get('/found/{uuid}', ThingFoundController::class)->name('found');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
