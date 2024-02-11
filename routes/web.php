<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\NewsController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::post('/login', [AuthManager::class, 'loginpost'])->name('login.post');
Route::get('/register', [AuthManager::class, 'registration'])->name('register');
Route::post('/registration', [AuthManager::class, 'registrationpost'])->name('registration.post');