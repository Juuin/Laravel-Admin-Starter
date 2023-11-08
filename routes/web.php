<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware('guest')->group(function () {
    Route::get('login', [\App\Http\Controllers\AdminController::class, 'loginForm'])->name('login');
    Route::post('login', [\App\Http\Controllers\AdminController::class, 'login']);
});

Route::middleware(['auth', 'permit'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('logout', [\App\Http\Controllers\AdminController::class, 'logout'])->name('logout');
    Route::get('profile/edit', [\App\Http\Controllers\AdminController::class, 'edit'])->name('profile.edit');
    Route::put('password/update', [\App\Http\Controllers\AdminController::class, 'updatePassword'])->name('password.update');
    Route::get('admin/list', [\App\Http\Controllers\AdminController::class, 'adminList'])->name('admin.list');
});
