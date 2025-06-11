<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\AuthController;

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

Route::get('/admin', [\App\Http\Controllers\admin\DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/admin/profile', [\App\Http\Controllers\admin\DashboardController::class, 'profile'])->name('dashboard.profile');
