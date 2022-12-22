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


Route::redirect('/', '/login');

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name("login");

    Route::post('login', 'validateLogin')->name("sign_in");

    Route::get('register', 'register')->name("register");

    Route::post('register', 'processRegistration')->name("signup");

    Route::get('logout', 'logout')->name("logout");
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('dashboard', 'index')->name('home');

    Route::get('todo/{todo}', 'showTodo')->name('showTodo');

    Route::post('new-todo', 'addTodo')->name('addTodo');

    Route::put('update-todo/{todo}', 'updateTodo')->name('updateTodo');

    Route::delete('delete-todo/{todo}', 'deleteTodo')->name('deleteTodo');
});
