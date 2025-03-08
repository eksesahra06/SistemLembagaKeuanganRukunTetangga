<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengeluaranController;
use Illuminate\Support\Facades\Route;

// Halaman utama (login)
Route::get('/', function () {
    return view('auth.login');
});

// Group route untuk middleware auth
Route::middleware(['auth'])->group(function () {
    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

    //resource routes
    Route::resource('keluarga', KeluargaController::class);
    Route::resource('pembayaran', PembayaranController::class);

    Route::resource('pengeluaran', PengeluaranController::class);

    //profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //keluarga routes
    Route::get('/keluarga', [KeluargaController::class, 'index'])->name('keluarga.index');
    Route::get('/keluarga/create', [KeluargaController::class, 'create'])->name('keluarga.create');
    Route::post('/keluarga', [KeluargaController::class, 'store'])->name('keluarga.store');
    Route::get('/keluarga/{id}/edit', [KeluargaController::class, 'edit'])->name('keluarga.edit');
    Route::put('/keluarga/{id}', [KeluargaController::class, 'update'])->name('keluarga.update');
    Route::delete('/keluarga/{id}', [KeluargaController::class, 'destroy'])->name('keluarga.destroy');

    Route::get('/pembayaran/{pembayaran}/pdf', [PembayaranController::class, 'generatePdf'])->name('pembayaran.pdf');
});

// Include auth routes
require __DIR__.'/auth.php';