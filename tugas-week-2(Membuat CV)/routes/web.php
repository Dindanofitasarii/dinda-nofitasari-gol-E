<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', [ProfileController::class, 'index'])->name('home');

// Halaman Portfolio
Route::get('/portfolio', [ProfileController::class, 'portfolio'])->name('portfolio');