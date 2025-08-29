<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DashboardController;

// Redirect halaman utama ke home
Route::get('/', function () {
    return redirect()->route('login');
});

// Home
Route::get('/home', function () {
    return view('home');
})->name('home');

// About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Dashboard (hanya bisa diakses setelah login)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Resource untuk surat masuk/keluar
Route::resource('surat-masuk', SuratMasukController::class);
Route::resource('surat-keluar', SuratKeluarController::class);

// Profile (default dari Jetstream/Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
