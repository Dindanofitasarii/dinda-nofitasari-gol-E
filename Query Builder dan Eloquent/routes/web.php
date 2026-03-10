<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\OutletController;

// Halaman utama
Route::get('/', [UserController::class, 'index']);

// --- Manajemen User ---
Route::get('/users', [UserController::class, 'index']);
Route::post('/users/store', [UserController::class, 'store']);
Route::post('/users/update/{id}', [UserController::class, 'update']);
Route::get('/users/delete/{id}', [UserController::class, 'destroy']);

// --- Manajemen Jadwal ---
Route::get('/schedules', [ScheduleController::class, 'index']);
Route::post('/schedules/store', [ScheduleController::class, 'store']);
Route::post('/schedules/update/{id}', [ScheduleController::class, 'update']);
Route::get('/schedules/delete/{id}', [ScheduleController::class, 'destroy']);

// --- Manajemen Outlet ---
Route::get('/outlets', [OutletController::class, 'index']);
Route::post('/outlets/store', [OutletController::class, 'store']);
Route::post('/outlets/update/{id}', [OutletController::class, 'update']);
Route::get('/outlets/delete/{id}', [OutletController::class, 'destroy']);