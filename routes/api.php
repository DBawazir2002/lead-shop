<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CountryController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(['auth:sanctum','isVerified']);


Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

// validation
Route::get('/email/verify/{id}', [VerificationController::class,'verify'])->name('verification.verify');
Route::get('/email/resend/{id}', [VerificationController::class,'resend'])->name('verification.resend');


Route::prefix('manager')->middleware(['auth:sanctum','role:admin|super-admin'])->group(function(){

    Route::apiResource('users',UserController::class);

    Route::apiResource('countries',CountryController::class);
});

