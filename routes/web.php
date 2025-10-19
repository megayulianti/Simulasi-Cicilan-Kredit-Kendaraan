<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimulasiController;

// ✅ Buka root URL langsung arahkan ke simulasi
Route::get('/', function () {
    return redirect('/simulasi');
});

// ✅ Route simulasi yang sudah kamu buat
Route::get('/simulasi', [SimulasiController::class, 'index'])->name('frontend.simulasi.index');
Route::post('/simulasi', [SimulasiController::class, 'hitung'])->name('frontend.simulasi.hitung');
Route::get('/simulasi/download/{id}', [SimulasiController::class, 'downloadPdf'])->name('frontend.simulasi.download');
