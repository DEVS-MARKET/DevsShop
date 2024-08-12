<?php

use App\Http\Middleware\CheckInstallationStatus;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Ok ' . config('cache.default');
});
require_once __DIR__ . '/installer.php';

Route::middleware(CheckInstallationStatus::class)->group(function () {
    Route::prefix('/admin')->group(function () {
        require_once __DIR__ . '/admin.php';
    });
});
