<?php

use App\Http\Controllers\auth\RegisterUserController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


require __DIR__.'/auth.php';
Route::get('/', [HomeController::class,'index'])->name('home');

Route::post('create-account',[RegisterUserController::class,'store'])->name('valdite_user');


// Menu
Route::get('/menu/filter?menuType=', [MenuController::class, 'index'])->name('menu');
