<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SongRequestController;

Route::get('/', [PublicController::class, 'home']);

///debug percobaan
    Route::get('/debug', function () {
    return 'debug-ok';
});
Route::get('/request', [SongRequestController::class, 'create'])
    ->name('request.create');

Route::post('/request', [SongRequestController::class, 'store'])
    ->name('request.store');
Route::get('/queue', [SongRequestController::class, 'queue'])
    ->name('queue');
Route::get('/display', [SongRequestController::class, 'display'])
    ->name('display');

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\AdminController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/requests', [AdminController::class, 'requests'])->name('admin.requests');
    Route::patch('/requests/{songRequest}/status', [AdminController::class, 'updateStatus'])->name('admin.requests.updateStatus');
});
