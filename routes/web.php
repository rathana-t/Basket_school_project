<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [HomeController::class, 'login']);
Route::get('/reg', [HomeController::class, 'reg']);
Route::get('/detailPage', [HomeController::class, 'detail']);


Route::post('/signin', [UserController::class, 'signin'])->name("signin");
Route::post('/register', [UserController::class, 'register'])->name("register");

<<<<<<< HEAD

=======
Route::get('/seller/dashboard', [SellerController::class, 'dashboard']);
Route::get('/seller/add-product', [SellerController::class, 'add_product']);
Route::get('/seller/new-order', [SellerController::class, 'new_order']);
Route::get('/seller/old-order', [SellerController::class, 'old_order']);
Route::get('/seller/profile', [SellerController::class, 'profile']);
>>>>>>> 0e4a194e783192cbe651be1897f09376e426ab12
