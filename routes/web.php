<?php

require __DIR__.'/admin.php';
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return redirect()->route('admin.dashboard');
// })->name('admin');

