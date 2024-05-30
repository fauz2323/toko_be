<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/logout', [App\Http\Controllers\HomeController::class, 'logOut'])->name('logout');

    Route::get('/admin/user', [App\Http\Controllers\Admin\UserAdminController::class, 'index'])->name('admin.user');
});
