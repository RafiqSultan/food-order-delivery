<?php

use App\Http\Controllers\auth\RegisterUserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){
Route::get('register',[RegisterUserController::class ,'create'])->name('register');



 });

?>