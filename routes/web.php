<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\LkController;
use App\Http\Controllers\RaspisanieController;
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


Route::get('/', [NewsController::class, 'index'])->name('home');
Route::post('addnews', [NewsController::class, 'index2'])->name('addnews');
Route::get('/events', [EventController::class, 'index1'])->name('events');
Route::get('/lk', [LkController::class, 'index'])->name('lk');
Route::get('/map', [EventController::class, 'index1'])->name('map');
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::get('map', [MapController::class, 'index'])->name('map');
Route::post('/login', [AuthManager::class, 'loginpost'])->name('login.post');
Route::post('registerevent', [EventController::class, 'index'])->name('registerevent');
Route::get('/register', [AuthManager::class, 'registration'])->name('register');
Route::post('/registration', [AuthManager::class, 'registrationpost'])->name('registration.post');
Route::post('addevent', [EventController::class, 'index2'])->name('addevent');