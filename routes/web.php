<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProxyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/server', [ProxyController::class, 'proxy']);

Route::middleware(['api.auth'])->controller(DashboardController::class)->group(
    function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    }
);
Route::middleware(['api.auth'])->group(
    function () {
        Route::resource('/device', DeviceController::class);
        Route::resource('/monitor', MonitorController::class);
        Route::get('/tree', [MonitorController::class, 'tree']);
    }
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
