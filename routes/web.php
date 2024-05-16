<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gallery', [GalleryController::class, 'gallery']);

Route::get('/upload', [GalleryController::class, 'add']);
Route::post('/store', [GalleryController::class, 'store']);
