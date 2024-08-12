<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;

Route::view('/admin/login', 'admin.auth.login')->name('login');
Route::post('/admin/login', AuthController::class)->name('login');
