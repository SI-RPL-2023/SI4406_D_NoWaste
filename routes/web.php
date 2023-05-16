<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Middleware\AuthenticateMerchant;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/search', [HomeController::class, 'search']);
Route::get('/merchants/{merchant}', [MerchantController::class, 'show']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'auth']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::group(['prefix' => 'merchant', 'middleware' => 'auth.merchant'], function() {
    Route::get('/', [MerchantController::class, 'index']);
    Route::get('/menu', [ProductController::class, 'index']);
    Route::get('/menu/add', [ProductController::class, 'create']);
    Route::post('/menu/add', [ProductController::class, 'store']);
    Route::get('/menu/{product}/edit', [ProductController::class, 'edit']);
    Route::post('/menu/{product}/edit', [ProductController::class, 'update']);
    Route::delete('/menu/{product}', [ProductController::class, 'destroy']);
    Route::get('/profile', [MerchantController::class, 'edit']);
    Route::post('/profile', [MerchantController::class, 'update']);
    Route::get('/profile/password', [MerchantController::class, 'editPassword']);
    Route::post('/profile/password', [MerchantController::class, 'updatePassword']);
    Route::get('/logout', [LoginController::class, 'destroy']);
});

Route::get('/signin', [AdminController::class, 'signin']);
Route::post('/signin', [AdminController::class, 'auth']);

Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function() {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/signout', [AdminController::class, 'destroy']);
});
