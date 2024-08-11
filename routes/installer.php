<?php

use App\Http\Controllers\Installer\EnviromentController;
use App\Http\Middleware\DisableInstallerWhenInstalled;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::middleware(DisableInstallerWhenInstalled::class)
    ->name('installer.')
    ->prefix('installer')
    ->group(function () {
        Route::view('/', 'installer.index')->name('index');
        Route::view('/database', 'installer.database')->name('database');

        Route::post('/environment', [EnviromentController::class, 'update'])->name('environment');

        Route::view('/email', 'installer.email')->name('email');
        Route::view('/cache', 'installer.cache')->name('cache');
        Route::get('/finish', [EnviromentController::class, 'finish'])->name('finish');
        Route::get('/finish/lock', function () {
            Storage::put('installer/installed.lock', '');
            return 'Locked!';
        })->name('finish.lock');
    });
