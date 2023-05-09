<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'auth']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::group(['prefix' => 'merchant', 'middleware' => 'auth.merchant'], function() {
    Route::get('/', [MerchantController::class, 'index']);
    Route::get('/menu', [ProductController::class, 'index']);
    Route::get('/menu/add', [ProductController::class, 'create']);
    Route::post('/menu/add', [ProductController::class, 'store']);
    Route::get('/menu/edit', [ProductController::class, 'edit']);
    Route::post('/menu/edit', [ProductController::class, 'update']);
    Route::get('/logout', [LoginController::class, 'destroy']);
});
