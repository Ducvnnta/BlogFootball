<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaptureController;
use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\NewController;
use App\Http\Controllers\web\DayController;
use App\Http\Controllers\web\RankController;
use App\Http\Controllers\web\ScheduleController;
use App\Http\Controllers\web\detailnewscontroller;
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

    Route::get('/113', function () {
        return view("web.test");
    });
Route::get('detail', function () {
    return view("web.detail");
});
Route::get('detailnews', function () {
    return view("web.news.show");
});
Route::get('ranknew', function () {
    return view("web.news.rank");
});

Route::get('/',  [HomeController::class, 'titlehot']);

Route::get('/tin-tuc/{id}', [NewController::class, 'show'])->name('web.news.show');

Route::get('/bang-xep-hang/{id}',[RankController::class, 'rankdetail'])->name('web.news.rank');

Route::get('/lich-thi-dau/{id}',[ScheduleController::class, 'scheduledetail'])->name('web.news.schedule');

Route::get('/giai-dau/{id}', [CategoryController::class, 'categorydetail'])->name('web.news.category');

Route::get('/search',  [HomeController::class, 'getSearch'])->name('home.search');

Route::get('/capture', [CaptureController::class, 'index']);
Route::post('/capture/store', [CaptureController::class, 'store'])->name('capture.store');
