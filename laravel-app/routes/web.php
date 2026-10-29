<?php

use App\Http\Controllers\Auth\NjbLoginController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [NjbLoginController::class, 'show'])->name('login');
Route::post('/login', [NjbLoginController::class, 'login'])->middleware('throttle:6,1')->name('login.submit');
Route::post('/logout', [NjbLoginController::class, 'logout'])->name('logout');

Route::middleware('njb.admin')->group(function () {
    Route::get('/', fn () => view('welcome'))->name('dashboard');
    Route::resource('students', StudentController::class)->except(['show']);
});
