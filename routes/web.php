<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    KehadiranController,
    TamuController,
};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('kehadiran', KehadiranController::class);
Route::resource('tamu', TamuController::class);
