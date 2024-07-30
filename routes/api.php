<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddTruckRequestController;

/// Authenticate
// Route::post('/authenticate', 'Auth\LoginController@user_authenticate');
//Route::post('/databse_backup', 'Admin\Tenant\BackupController@databse_backup');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'viewProfile']);
    Route::post('/add-truck-request', [AddTruckRequestController::class, 'submitForm']);
    Route::get('/request-list', [AddTruckRequestController::class, 'orderList']);
});
