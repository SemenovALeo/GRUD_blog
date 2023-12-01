<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::view('/', 'welcome');
Route::get('test', TestController::class);

Route::get('register',[RegisterController::class,'index'])->name('register');
Route::post('register',[RegisterController::class,'store'])->name('register.store');

Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'store'])->name('login.store');



