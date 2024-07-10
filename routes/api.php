<?php

use App\Http\Controllers\API\AuthController;
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


Route::prefix('admin')->middleware(['auth:sanctum','role:admin|super-admin'])->group(function(){
    Route::get('/g',function () {
        return ( auth()->user()->hasRole('super-admin') == true) ? 'You are super admin' : 'error';
    });

    Route::apiResource('users',UserController::class);
});

