<?php

use App\Http\Controllers\TopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginLogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;


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
Route::middleware(['auth'])->group(function () {
    Route::get('main', action: [PostController::class, 'mainpage'])->name('main');

    Route::get('admin', [AdminController::class, 'adminpage'])
            ->middleware('can:admin')->name('admin');
});

Route::get('/', action: [TopController::class, 'toppage'])->name('top');

Route::get('login', action: [LoginLogoutController::class, 'loginform'])->name('login');

Route::post('login', action: [LoginLogoutController::class, 'login'])->name('auth');

Route::get('register', action: [LoginLogoutController::class, 'registerform'])->name('register');

Route::post('register', action: [LoginLogoutController::class, 'register'])->name('register');

Route::post('logout', action: [LoginLogoutController::class, 'logout'])->name('logout');
