<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

use App\Http\Middleware\TokenJWT;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerSubmit'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logoutSubmit'])->name('logout');

Route::get('/users', [UserController::class, 'index'])->name('users')->middleware(TokenJWT::class);
Route::get('/users/{user_id}/verified', [UserController::class, 'verified'])->name('users.verified')->middleware(TokenJWT::class);

Route::get('/products', [ProductController::class, 'index'])->name('products')->middleware(TokenJWT::class);
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware(TokenJWT::class);
Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware(TokenJWT::class);
Route::delete('/products/{product_id}/delete', [ProductController::class, 'delete'])->name('products.delete')->middleware(TokenJWT::class);