<?php

use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\auth\RegisterUserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){
// Route Register
Route::get('register',[RegisterUserController::class ,'create'])->name('register');
Route::post('register',[RegisterUserController::class,'store'])->name('valdite_user');

// Login
Route::get('login',[AuthenticatedSessionController::class,'index'])->name('login');
Route::post('login',[AuthenticatedSessionController::class,'valditeUser']);
//  Forgot Password
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

//  Reset Password
Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');

 });


 Route::middleware('auth')->group(function(){

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

 });

 ?>
