<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerjalananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


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

Route::get('/dashboard', function () {
    return view('pages.dashboard-page');
});

Route::get('/input',[perjalananController::class, 'halamanInput'])->middleware('auth');
Route::post('/simpanInput',[perjalananController::class, 'saveInput'])->middleware('auth');

Route::get('/table', [perjalananController::class, 'index'])->middleware('auth');

Route::get('/register', [UserController::class, 'halamanRegister'])->middleware('guest');
Route::post('/berhasilRegister', [UserController::class, 'simpanUser']);

Route::get('/',[LoginController::class, 'halamanLogin'])->name('login')->middleware('guest');
Route::post('/postLogin',[LoginController::class,'Login']);

Route::get('/logout',[LoginController::class, 'LogOut']);

Route::get('/cari', [PerjalananController::class, 'cariPerjalanan'])->middleware('auth');

Route::delete('/delete',[PerjalananController::class, 'deletePerjalanan']);

