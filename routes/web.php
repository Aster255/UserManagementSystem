<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/delete-multiple', [UserController::class, 'deleteMultiple'])->name('users.deleteMultiple');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user_id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user_id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user_id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{user_id}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::delete('/users/{user_id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/destroy-multiple', [UserController::class, 'destroyMultiple'])->name('users.destroyMultiple');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
