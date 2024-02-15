<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RegisterController;
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


Route::get('/', HomePageController::class);

// Login
Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest');

Route::delete('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth');

// Register
Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->middleware('guest');

//Dashboard
Route::get('/dashboard', DashboardController::class)
    ->middleware('auth')
    ->name('dashboard');

// Purchases related
Route::get('/purchases', [PurchaseController::class, 'index'])
    ->middleware('auth')
    ->name('purchases');

Route::get('/purchase/create', [PurchaseController::class, 'create'])
    ->middleware('auth');

Route::post('/purchase/create', [PurchaseController::class, 'store'])
    ->middleware('auth');

Route::get('/purchase/{purchase}', [PurchaseController::class, 'show'])
    ->middleware('auth')
    ->whereNumber('post');

Route::get('/purchase/edit/{purchase}', [PurchaseController::class, 'edit'])
    ->middleware('auth');

Route::put('/purchase/edit/{purchase}', [PurchaseController::class, 'update'])
    ->middleware('auth');

Route::delete('/purchase/edit/{purchase}', [PurchaseController::class, 'destroy'])
    ->middleware('auth');
