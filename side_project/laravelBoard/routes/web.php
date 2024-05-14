<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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
    return view('login');
})->name('get.login');

Route::post('/login', [UserController::class, 'login'])->name('post.login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
// -----------
// 게시판 관련
// -----------

Route::middleware('auth')->resource('/board', BoardController::class);

// -------------
// 회원가입 관련
// ---------------

Route::get('/regist', function () {
    return view('regist');
})->name('regist.index');

Route::post('/regist', [UserController::class, 'regist'])->name('regist.store');

// 이메일 체크
Route::post('/user/chk', [UserController::class, 'emailChk']);
 