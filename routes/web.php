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
Route::prefix('/main')->group(function () {
    Route::get('/posts', [PostController::class, 'mainpage'])->name('main');
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    Route::get('/posts/edit/{post}', [PostController::class, 'postsEdit'])->name('post.edit');
    Route::put('/posts/edit/{post}', [PostController::class, 'postUpdate'])->name('post.update');
    Route::delete('/posts/destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    // 管理者ユーザーのみ
    Route::group(['middleware' => ['auth', 'can:admin']], function () {
        Route::get('/admin', [AdminController::class, 'adminpage'])->name('admin');
        Route::get('/admin/form', [AdminController::class, 'editform'])->name('edit');
        Route::post('/admin/form', [AdminController::class, 'check'])->name('formSend');
        Route::put('/admin/update', [AdminController::class, 'update'])->name('update');
    });
});
Route::get('/', action: [TopController::class, 'toppage'])->name('top');

Route::get('login', action: [LoginLogoutController::class, 'loginform'])->name('login');

Route::post('login', action: [LoginLogoutController::class, 'login'])->name('auth');

Route::get('register', action: [LoginLogoutController::class, 'registerform'])->name('register');

Route::post('register', action: [LoginLogoutController::class, 'register'])->name('register');

Route::post('logout', action: [LoginLogoutController::class, 'logout'])->name('logout');
