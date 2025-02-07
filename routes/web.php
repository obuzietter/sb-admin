<?php

require __DIR__.'/admin.php';
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('admin/dashboard', function () {
//     return view('about');
// })->name('admin.dashboard');