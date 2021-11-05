<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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

Route::get('/login', [AuthController::class, 'signinView'])->name('login');
Route::post('/signin', [AuthController::class, 'signinAction']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'dashboardView']);

Route::get('/usuarios/ajax', [UserController::class, 'listAction']);
Route::get('/usuarios', [UserController::class, 'listView']);