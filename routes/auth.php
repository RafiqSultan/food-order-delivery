<?php

use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\auth\RegisterUserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){
Route::get('register',[RegisterUserController::class ,'create'])->name('register');
Route::post('register',[RegisterUserController::class,'store'])->name('valdite_user');


Route::get('login',[AuthenticatedSessionController::class,'index'])->name('login');
Route::post('login',[AuthenticatedSessionController::class,'valditeUser']);




 });


 Route::middleware('auth')->group(function(){

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

 });

 ?>
