<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BloodStockController;


// total stok darah based gol_darah & total all
Route::get('/totalstok',[BloodStockController::class,'totalstok']);
Route::get('/totalall',[BloodStockController::class,'totalall']);

// auth register
Route::post('/register',[AuthenticationController::class, 'register']);

// auth login
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/logout', [AuthenticationController::class, 'logout'])->middleware(['auth:sanctum']);


// admin gruop
Route::group(['middleware' => ['auth:sanctum', 'admin']], function () {

    // reset password
    Route::put('/changePassword', [AuthenticationController::class,'changePassword']);

    // Rute-rute yang memerlukan hak akses sebagai admin di sini
    Route::get('/me', [AuthenticationController::class, 'me']);


    // users
    Route::get('/users', [UserController::class,'index']);
    //Route::post('/users',[UserController::class, 'store'])->middleware(['role:admin']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    // akses stok darah oleh admin  
    Route::get('/blood_stocks', [BloodStockController::class,'index']);
    Route::post('/blood_stocks', [BloodStockController::class,'store']);
    Route::get('/blood_stocks/{id}', [BloodStockController::class,'show']);
    Route::get('/blood_stocks/{id}',[BloodStockController::class,'edit']);
    Route::put('/blood_stocks/{id}', [BloodStockController::class, 'update']);
    Route::delete('/blood_stocks/{id}', [BloodStockController::class,'delete']);
});




