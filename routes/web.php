<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Masukkan route yang mewajibkan login ke dalam grup auth
Route::middleware('auth')->group(function () {
    
    // Gunakan Route::resource agar index, create, store, edit, update, destroy terbuat otomatis!
    Route::resource('penjualan', PenjualanController::class);
    
    // Route Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';