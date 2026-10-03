<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

Route::get('/', function () {
    return redirect()->route('berita.index');
});

Route::resource('berita', BeritaController::class)
    ->parameters(['berita' => 'berita']);
