<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function() {
  return redirect('login');
});
Route::get('/login', [AuthController::class, 'signinView'])->name('login');
Route::post('/login', [AuthController::class, 'signinAction']);

Route::get('/esqueci-minha-senha', [AuthController::class, 'recoverPasswordView']);
Route::post('/esqueci-minha-senha', [AuthController::class, 'recoverPasswordAction']);

Route::get('/nova-senha/{token}', [AuthController::class, 'resetPasswordView']);
Route::post('/nova-senha/{token}', [AuthController::class, 'resetPasswordAction']);

Route::get('/logout', [AuthController::class, 'logout']);



Route::get('/dashboard', [DashboardController::class, 'dashboardView']);

Route::get('/usuarios/ajax', [UserController::class, 'listAction']);
Route::get('/usuarios', [UserController::class, 'listView']);
Route::get('/usuarios/cadastrar', [UserController::class, 'storeView']);
Route::post('/usuarios/cadastrar', [UserController::class, 'storeAction']);
Route::get('/usuarios/excluir/{id}', [UserController::class, 'deleteView']);
Route::get('/usuarios/excluir/confirm/{id}', [UserController::class, 'deleteAction']);
Route::get('/usuarios/editar/{id}', [UserController::class, 'editView']);
Route::post('/usuarios/editar', [UserController::class, 'editAction']);


Route::get('/clientes/ajax', [CustomerController::class, 'listAction']);
Route::get('/clientes', [CustomerController::class, 'listView']);
Route::get('/clientes/cadastrar', [CustomerController::class, 'storeView']);
Route::post('/clientes/cadastrar', [CustomerController::class, 'storeAction']);
Route::get('/clientes/editar/{id}', [CustomerController::class, 'editView']);
Route::post('/clientes/editar', [CustomerController::class, 'editAction']);
Route::get('/clientes/excluir/{id}', [CustomerController::class, 'deleteView']);
Route::get('/clientes/excluir/confirm/{id}', [CustomerController::class, 'deleteAction']);


Route::get('/produtos/ajax', [ProductController::class, 'listAction']);
Route::get('/produtos', [ProductController::class, 'listView']);
Route::get('/produtos/cadastrar', [ProductController::class, 'storeView']);
Route::post('/produtos/cadastrar', [ProductController::class, 'storeAction']);
Route::get('/produtos/editar/{id}', [ProductController::class, 'editView']);
Route::post('/produtos/editar', [ProductController::class, 'editAction']);
Route::get('/produtos/excluir/{id}', [ProductController::class, 'deleteView']);
Route::get('/produtos/excluir/confirm/{id}', [ProductController::class, 'deleteAction']);