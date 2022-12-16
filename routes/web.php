<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', redirect('/login'));

Route::get('login', [AuthController::class, 'login'])->name("login");

Route::post('login', [AuthController::class, 'validateLogin'])->name("sign_in");

Route::get('register', [AuthController::class, 'register'])->name("register");

Route::post('register', [AuthController::class, 'processRegistration'])->name("signup");

Route::get('dashboard', [DashboardController::class, 'index'])->name('home');

Route::get('todo/{id}', [DashboardController::class, 'showTodo']);

Route::get('logout', [AuthController::class, 'logout'])->name("logout");
