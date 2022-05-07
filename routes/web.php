<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ClientController::class,'index'])->name('index');
Route::get('/login', [UserController::class,'login'])->name('login');
Route::get('/register', [UserController::class,'register'])->name('register');
Route::get('/check', [UserController::class,'check'])->name('check');
Route::get('/store', [UserController::class,'store'])->name('store');
Route::get('/logout', [UserController::class,'logout'])->name('logout');
Route::get('/checkout', [ClientController::class,'checkout'])->name('checkout');
Route::get('/order', [BorrowController::class,'store'])->name('order');

Route::get('/admin', [AdminController::class,'dashboard'])->name('dashboard');

