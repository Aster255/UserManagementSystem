<?php
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, "login"]);
Route::post('/register', [AuthController::class, "register"]);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, "logout"]);
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::patch('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/delete-multiple', [UserController::class, 'destroyMultiple']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
});

