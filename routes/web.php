<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\ActivityLogs\UpdateProductController;
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

 
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::group(['middleware' => ['guest']], function() {
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
});

Route::group(['middleware' => ['auth']], function() {
    
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    
    Route::prefix('products')->group(function(){
        Route::get('/create', [ProductController::class, 'create']);
        Route::post('/store', [ProductController::class, 'store']);
        Route::get('/', [ProductController::class, 'index']);
        // Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
        Route::get('/edit/{id}', [ProductController::class, 'edit']);
        Route::put('/update/{id}', [ProductController::class, 'update']); 
    });
       
    Route::prefix('category')->group(function(){
           Route::get('/', [CategoryController::class, 'index']);
           Route::get('/categories', [CategoryController::class, 'categories']);
           
           Route::get('/create', [CategoryController::class, 'create']);
           Route::post('/store', [CategoryController::class, 'store']);
    });

    Route::get('activit-logs',[UpdateProductController::class, 'update_productss_logs']);
    Route::get('logs',[UpdateProductController::class, 'logs']);
});
