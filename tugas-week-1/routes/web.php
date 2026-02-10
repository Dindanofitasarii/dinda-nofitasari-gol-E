<?php

use App\Http\Controllers\PortofolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/portofolio',  [PortofolioController::class,'index']);
   