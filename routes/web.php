<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CatogeryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WriteController;
use App\Http\Middleware\MustBeGuestUser;
use App\Http\Middleware\MustBeLoginUser;
use Illuminate\Support\Facades\Route;

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

Route::middleware(MustBeLoginUser::class)->group(function () {
    Route::get('/', [BlogController::class, 'index']);
    Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
    Route::get('/write', [WriteController::class, 'create']);
    Route::post('/write', [WriteController::class, 'store']);
    Route::post('/logout', [LogoutController::class, 'destory']);
    Route::get('/categories/{category:id}', [CatogeryController::class, 'index']);
    Route::get('/users/{user:username}', [UserController::class, 'index']);
    Route::post('/blogs/{blog}/comment/store', [CommentController::class, 'store']);
    Route::post('/blogs/{blog}/subscribe', [SubscriberController::class, 'store']);
});

Route::middleware(MustBeGuestUser::class)->group(function () {

    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'store']);
});
