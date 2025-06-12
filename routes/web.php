<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\LandController;
use App\Http\Controllers\admin\CropController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login']);
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'verify'])->name('auth.verify');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/admin/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');

    Route::get('admin/lands', [LandController::class, 'index'])->name('lands.index');
    Route::get('admin/lands/create', [LandController::class, 'create'])->name('lands.create');
    Route::post('admin/lands/store', [LandController::class, 'store'])->name('lands.store');
    Route::get('admin/lands/{id}/edit', [LandController::class, 'edit'])->name('lands.edit');
    Route::put('admin/lands/{id}/update', [LandController::class, 'update'])->name('lands.update');
    Route::delete('admin/lands/{id}/delete', [LandController::class, 'destroy'])->name('lands.destroy');

    Route::get('admin/crops', [CropController::class, 'index'])->name('crops.index');
    Route::get('admin/crops/create', [CropController::class, 'create'])->name('crops.create');
    Route::post('admin/crops/store', [CropController::class, 'store'])->name('crops.store');
    Route::get('admin/crops/{id}/edit', [CropController::class, 'edit'])->name('crops.edit');
    Route::put('admin/crops/{id}/update', [CropController::class, 'update'])->name('crops.update');
    Route::delete('admin/crops/{id}/delete', [CropController::class, 'destroy'])->name('crops.destroy');
});
