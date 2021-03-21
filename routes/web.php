<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Test\TestController;

Route::get('/about', [TestController::class, 'about']);
Route::get('/contact', [TestController::class, 'contact'])->name('contact');

Route::get('/', function () {
    return view('master');
});

Route::get('/dashboard', function () {
    return view('admin/master');
});
