<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\KategoriController;

// ROUTE KATEGORI
Route::resource('/kategori', KategoriController::class);
Route::get('/cari', [KategoriController::class, 'cari'])->name('cari');

// ROUTE ABOUT
Route::get('/about', [AboutController::class, 'index']);

// ROUTE ARSIP
// Route::resource('/', ArsipController::class);
Route::get('/', [ArsipController::class, 'index']);
Route::post('/', [ArsipController::class, 'store']);
Route::get('/create', [ArsipController::class, 'create']);
Route::get('/search', [ArsipController::class, 'search'])->name('search');
Route::get('download/{id?}', [ArsipController::class, 'download'])->where('id', '(.*)');
Route::get('edit/{id?}', [ArsipController::class, 'edit'])->where('id', '(.*)');
Route::put('update/{id?}', [ArsipController::class, 'update'])->where('id', '(.*)');
Route::get('/{id?}', [ArsipController::class, 'show'])->where('id', '(.*)');
Route::delete('/{id?}', [ArsipController::class, 'destroy'])->where('id', '(.*)');
