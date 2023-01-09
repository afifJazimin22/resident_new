<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResidentController;
use App\Http\Middleware\CustomAuthMiddleware;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('login_action', [LoginController::class, 'login_action'])->name('login.action');

Route::view('/', 'home');
Route::view('/test', 'Test.test')->name('test.index');

//resident

Route::get('/resident', [ResidentController::class, 'index'])->name('resident.index')->middleware('custom-auth');

Route::post('newresident', [ResidentController::class, 'store'])->name('resident.store')->middleware('custom-auth');

Route::get('show/{id}', [ResidentController::class, 'show'])->name('resident.show')->middleware('custom-auth');
Route::delete('residents/{id}', [ResidentController::class, 'delete'])->name('residents.delete')->middleware('custom-auth');