<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ServerController;
use Illuminate\Support\Facades\Route;

Route::view('/login', 'admin.auth.login')->name('login');
Route::post('/login', AuthController::class)->name('login');


Route::middleware(['auth'])->name('admin.')->group(function () {
   Route::get('/', IndexController::class)->name('index');

   Route::prefix('servers')->middleware('permission:servers.index')->name('servers.')->group(function () {
       Route::get('/', ServerController::class)->name('index');
       Route::middleware('permission:servers.create')->post('/store', [ServerController::class, 'store'])->name('store');
       Route::middleware('permission:servers.update')->put('/{server}', [ServerController::class, 'update'])->name('update');
       Route::middleware('permission:servers.delete')->delete('/{server}', [ServerController::class, 'destroy'])->name('destroy');
   });
});

