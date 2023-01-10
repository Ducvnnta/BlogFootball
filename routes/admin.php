<?php

use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\EditorController;
use App\Http\Controllers\Admin\RankController;
use App\Http\Controllers\web\AuthController as WebAuthController;

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

Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('admin.login.post');

Route::middleware('auth:admin')->group(function () {


  Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
  Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
  Route::get('/edit-profile', [AuthController::class, 'edit'])->name('admin.edit.profile');
  Route::get('/profile', [WebAuthController::class, 'getMe'])->name('admin.profile');


  Route::post('/ckeditor/upload', [EditorController::class, 'upload'])->name('admin.editor.upload');

  Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('admin.news');
    Route::get('/category', [NewsController::class, 'category'])->name('admin.category');

    Route::get('/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::get('/detail/{id}', [NewsController::class, 'detail'])->name('admin.news.detail');
    Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/update/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::post('/store', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/delete/{id}', [NewsController::class, 'destroy'])->name('admin.news.delete');
  });

  Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'category'])->name('admin.category');

    Route::get('/edit/{id}', [CategoryController::class, 'editCategory'])->name('admin.category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');

    Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/create', [CategoryController::class, 'store'])->name('admin.category.store');

    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');

  });

    Route::get('/admin', [AdminUserController::class, 'listAdmin'])->name('get.list.admin');
    Route::get('/user', [AdminUserController::class, 'listUser'])->name('get.list.user');

    // Route::get('/', [NewsController::class, 'index'])->name('admin.news');


Route::prefix('ranks')->group(function () {
    Route::get('/', [RankController::class, 'list'])->name('get.list.rank');

    Route::get('/create', [RankController::class, 'create'])->name('admin.rank.create');
    Route::post('/create', [RankController::class, 'store'])->name('admin.rank.store');

    Route::get('/edit/{id}', [RankController::class, 'edit'])->name('admin.rank.edit');
    Route::post('/update/{id}', [RankController::class, 'update'])->name('admin.rank.update');

    Route::get('/delete/{id}', [RankController::class, 'delete'])->name('admin.rank.delete');

});

});
