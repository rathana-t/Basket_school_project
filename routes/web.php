<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [HomeController::class, 'login']);
Route::get('/reg', [HomeController::class, 'reg']);
Route::get('/detailPage/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/cart', [HomeController::class, 'cart']);



Route::post('/signin', [UserController::class, 'signin'])->name("signin");
Route::post('/register', [UserController::class, 'register'])->name("register");
Route::get('/profile/{id}', [UserController::class, 'profile'])->name('display-profile')->middleware('checker');
Route::get('/logout', [UserController::class, 'logout'])->middleware('checker');

//=============Seller=================== 
Route::get('/sellerLogInPage', [SellerController::class, 'login_page']);
Route::get('/sellerRegisterPage', [SellerController::class, 'register_page']);
Route::post('/sellerLogIn', [SellerController::class, 'login']);
Route::post('/sellerRegister', [SellerController::class, 'register']);
Route::get('/logout_seller', [SellerController::class, 'logout'])->middleware('checker_seller');

Route::get('/forseller', [SellerController::class, 'forseller']);

Route::get('/seller/dashboard', [SellerController::class, 'dashboard'])->middleware('checker_seller');
Route::get('/seller/products', [SellerController::class, 'products'])->middleware('checker_seller');
Route::get('/seller/add-product', [SellerController::class, 'add_product'])->middleware('checker_seller');
Route::post('/seller/postProduct', [SellerController::class, 'postProduct']);
Route::get('/seller/new-order', [SellerController::class, 'new_order'])->middleware('checker_seller');
Route::get('/seller/old-order', [SellerController::class, 'old_order'])->middleware('checker_seller');
Route::get('/seller/profile', [SellerController::class, 'profile']);

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::get('/brand', [AdminController::class, 'brand']);
    Route::get('/add-brand', [AdminController::class, 'addBrand']);
    Route::post('/add-brand', [AdminController::class, 'storeBrand'])->name('brand.store');
    Route::get('/category', [AdminController::class, 'category']);
    Route::get('/add-category', [AdminController::class, 'addCategory']);
    Route::post('/store-category', [AdminController::class, 'storeCategory'])->name('category_store');

    Route::get('/secondary-category', [AdminController::class, 'secondaryCategory']);
    Route::get('/add-secondarycategory', [AdminController::class, 'addSecondaryCategory']);
    Route::post('/store-Secondcategory', [AdminController::class, 'storeSecondCategory'])->name('secondcategory_store');

    Route::get('/seller', [AdminController::class, 'seller']);
    Route::get('/seller/{id}', [AdminController::class, 'sellerDetail']);

    Route::get('/product', [AdminController::class, 'product']);
    Route::get('/product/{id}', [AdminController::class, 'detail']);
    Route::get('/edit/product/{id}', [AdminController::class, 'edit'])->name('edit_product');
    Route::post('/update/product/{id}', [AdminController::class, 'update']);
    Route::delete('delete-product', [AdminController::class, 'delete']);
    Route::delete('category-product', [AdminController::class, 'delete_cat']);

    Route::get('/user', [AdminController::class, 'user']);
    Route::get('/user/{id}', [AdminController::class, 'userDetail']);
});