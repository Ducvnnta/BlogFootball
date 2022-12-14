<?php

use App\Http\Controllers\web\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaptureController;
use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\web\HomeController;
use App\Http\Controllers\web\NewController;
use App\Http\Controllers\web\DayController;
use App\Http\Controllers\web\Detailnewscontroller;
use App\Http\Controllers\web\RankController;
use App\Http\Controllers\web\ScheduleController;
use App\Http\Controllers\web\UploadController;
use App\Http\Controllers\web\UserController;
use App\User;

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

//     Route::get('/113', function () {
//         return view("web.test");
//     });
// Route::get('detail', function () {
//     return view("web.detail");
// });
// Route::get('detailnews', function () {
//     return view("web.news.show");
// });
// Route::get('ranknew', function () {
//     return view("web.news.rank");
// });

// Route::get('register', function () {
//     return view('auth.register');
// })->name('auth.register');

// Route::get('detail', function () {
//     return view('admin.news.detail');
// })->name('admin.detail');

Route::get('/',  [HomeController::class, 'titlehot'])->name('web.home');
Route::get('/tin-tuc/{id}', [NewController::class, 'show'])->name('web.news.show');
Route::get('/bang-xep-hang/{id}',[RankController::class, 'rankdetail'])->name('web.news.rank');

Route::get('/lich-thi-dau/{id}',[ScheduleController::class, 'scheduledetail'])->name('web.news.schedule');

Route::get('/giai-dau/{id}', [CategoryController::class, 'categorydetail'])->name('web.news.category');

Route::get('/registration', [AuthController::class, 'registration'])->name('user.auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('user.registration');

Route::get('/reset', [AuthController::class, 'reset'])->name('web.reset.pass');
Route::post('/reset', [AuthController::class, 'sendResetLinkEmail'])->name('auth.reset.pass');


Route::get('/check-code', [AuthController::class, 'checkCode'])->name('user.check.code');
Route::post('/check-code', [AuthController::class, 'resetCodePassword'])->name('auth.check.code');

Route::get('/reset-pass', [AuthController::class, 'confirmPass'])->name('user.confirm.pass');
Route::post('/reset-pass', [AuthController::class, 'resetEmailPassword'])->name('auth.confirm.pass');


Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('auth.user.login');

Route::get('/logout', [AuthController::class, 'logoutAuth'])->name('auth.logout');
Route::get('/profile', [AuthController::class, 'getMe'])->name('auth.profile');

Route::post('/update-profile', [AuthController::class, 'updateProfile'])->name('auth.update.profile');
Route::get('/edit-profile', [AuthController::class, 'edit'])->name('auth.edit.profile');

Route::get('/comments', [Detailnewscontroller::class, 'comments'])->name('web.user.comments');
Route::post('/post-comments/{newId}', [Detailnewscontroller::class, 'postComment'])->name('user.post.comments');

Route::get('/profile/{id}', [AuthController::class, 'getMe'])->name('auth.profile');


Route::get('/search',  [HomeController::class, 'getSearch'])->name('home.search');

Route::get('/capture', [CaptureController::class, 'index']);
Route::post('/capture/store', [CaptureController::class, 'store'])->name('capture.store');
