<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\CarLogController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('login_action', [LoginController::class, 'login_action'])->name('login.action');

Route::view('/home', 'home');

//resident

Route::get('/resident', [ResidentController::class, 'index'])->name('resident.index');

Route::post('newresident', [ResidentController::class, 'store'])->name('resident.store');

Route::get('show/{id}', [ResidentController::class, 'show'])->name('resident.show');
Route::delete('residents/{id}', [ResidentController::class, 'delete'])->name('residents.delete');

//carlog

Route::get('/carlog', [CarLogController::class, 'index'])->name('car.index');