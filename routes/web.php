<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:pelapor'])->group(function () {
    Route::get('/lapor', [ReportController::class, 'create'])->name('report.create');
    Route::post('/lapor', [ReportController::class, 'store'])->name('report.store');
    Route::get('/riwayat-laporan', [ReportController::class, 'history'])->name('report.history');
});

Route::middleware(['auth', 'role:relawan_pemantau,koordinator'])->group(function () {
    Route::get('/laporan', [ReportController::class, 'index'])->name('report.index');
    Route::get('/laporan/{report}', [ReportController::class, 'show'])->name('report.show');
    Route::patch('/laporan/{report}/status', [ReportController::class, 'updateStatus'])->name('report.updateStatus');
});

require __DIR__ . '/auth.php';