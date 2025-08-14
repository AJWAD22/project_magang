<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about');
});

Route::get('/home', function () {
    return view('home', ['name' => 'Ultraman Cosmos']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/contact', function () {
    return view('contact');
});
