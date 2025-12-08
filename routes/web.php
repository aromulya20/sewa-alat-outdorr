<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\PenyewaanController;

// Redirect default ke dashboard alat
Route::get('/', function () {
    return redirect()->route('alat.dashboard');
});

// DASHBOARD
Route::get('/alat/dashboard', [DashboardController::class, 'index'])
    ->name('alat.dashboard');

// CRUD ALAT OUTDOOR
Route::resource('alat', AlatController::class);

// PEMESANAN SEWA
Route::get('/sewa', [PenyewaanController::class, 'index'])->name('sewa.index');
Route::get('/sewa/create', [PenyewaanController::class, 'create'])->name('sewa.create');
Route::post('/sewa', [PenyewaanController::class, 'store'])->name('sewa.store');


// PENGEMBALIAN SEWA
Route::get('/pengembalian', [PenyewaanController::class, 'pengembalian'])->name('pengembalian.index');
Route::post('/pengembalian/{id}', [PenyewaanController::class, 'prosesPengembalian'])->name('pengembalian.proses');


Route::post('/pengembalian/{id}', [PenyewaanController::class, 'prosesPengembalian'])
    ->name('pengembalian.proses');
