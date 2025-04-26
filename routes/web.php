<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kategori', function () {
    return view('pages.kategori.index');
});

Route::resource('/api/kategori', KategoriController::class);
