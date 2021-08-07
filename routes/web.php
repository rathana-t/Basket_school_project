<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return view('test');
});
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [HomeController::class, 'login']);
Route::get('/reg', [HomeController::class, 'reg']);
Route::get('/product/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/cart', [HomeController::class, 'cart']);
Route::post('/search-filter', [HomeController::class, 'search_filter'])->name('search-filter');
Route::get('/search', [HomeController::class, 'search']);
Route::get('/order', [HomeController::class, 'order']);
Route::get('/category', [HomeController::class, 'category']);
Route::get('/category/{id}', [HomeController::class, 'categoryItem']);
Route::get('/all-category', [HomeController::class, 'allCategory']);
Route::get('/smallcate/{id}', [HomeController::class, 'smallcate']);
Route::get('/brand/{id}', [HomeController::class, 'brand']);

Route::get('/store', [HomeController::class, 'store']);


Route::post('/signin', [UserController::class, 'signin'])->name("signin");
Route::post('/register', [UserController::class, 'register'])->name("register");
Route::get('/profile/{id}', [UserController::class, 'profile'])->name('display-profile')->middleware('checker');
// Route::get('/edit/{id}', [UserController::class, 'edit_profile'])->name('edit-profile');
Route::post('/update/{id}', [UserController::class, 'update_profile'])->name('update-profile');
Route::get('/history-order/{id}', [UserController::class, 'history_order'])->name('order-history');
Route::get('/wishlist/{id}', [UserController::class, 'wish_list'])->name('list-wish');
Route::get('/changepassword/{id}', [UserController::class, 'ch_password'])->name('change-password');
Route::post('/confirmChange/{id}', [UserController::class, 'confirm_ch'])->name('confirm-change');
Route::get('/logout', [UserController::class, 'logout'])->middleware('checker');

//=============Seller===================

Route::post('/add-to-cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/sellerLogInPage', [SellerController::class, 'login_page']);
Route::get('/sellerRegisterPage', [SellerController::class, 'register_page']);
Route::post('/sellerLogIn', [SellerController::class, 'login']);
Route::post('/sellerRegister', [SellerController::class, 'register']);
Route::get('/logout_seller', [SellerController::class, 'logout'])->middleware('checker_seller');
Route::get('/forseller', [SellerController::class, 'forseller']);

Route::get('/seller/dashboard', [SellerController::class, 'dashboard'])->middleware('checker_seller');
Route::get('/seller/products', [SellerController::class, 'products'])->middleware('checker_seller');
Route::get('/seller/productPending', [SellerController::class, 'productPending'])->middleware('checker_seller');
Route::get('/seller/choose-category', [SellerController::class, 'choose_main_cate'])->middleware('checker_seller');
Route::get('/seller/add-product/{id}', [SellerController::class, 'add_product'])->middleware('checker_seller');
Route::post('/seller/postProduct/{id}', [SellerController::class, 'postProduct'])->name('sellerpostProduct');
Route::get('/seller/new-order', [SellerController::class, 'new_order'])->middleware('checker_seller');
Route::get('/seller/old-order', [SellerController::class, 'old_order'])->middleware('checker_seller');
Route::get('/seller/profile', [SellerController::class, 'profile']);
Route::get('/seller/messages', [SellerController::class, 'sellerMessages']);
Route::get('/seller/messages/{id}', [SellerController::class, 'detailMsg']);
Route::get('/edit/product/{id}', [AdminController::class, 'edit'])->name('edit_product');
Route::post('/update/product/{id}', [ProductController::class, 'update'])->name('update_pro');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::get('/brand', [AdminController::class, 'brand']);
    Route::get('/add-brand', [AdminController::class, 'addBrand']);
    Route::post('/add-brand', [AdminController::class, 'storeBrand'])->name('brand.store');
    Route::get('/category', [AdminController::class, 'category']);
    Route::get('/add-category', [AdminController::class, 'addCategory']);
    Route::post('/store-category', [AdminController::class, 'storeCategory'])->name('category_store');

    Route::post('/sendMsg', [AdminController::class, 'sendMsg'])->name('sendMsg');

    Route::get('/secondary-category', [AdminController::class, 'secondaryCategory']);
    Route::get('/add-secondarycategory', [AdminController::class, 'addSecondaryCategory']);
    Route::post('/store-Secondcategory', [AdminController::class, 'storeSecondCategory'])->name('secondcategory_store');

    Route::get('/seller', [AdminController::class, 'seller']);
    Route::get('/seller/{id}', [AdminController::class, 'sellerDetail']);

    Route::get('/product', [AdminController::class, 'product']);
    Route::get('/productRequest', [AdminController::class, 'productRequest']);
    Route::get('/productRequest/{id}', [AdminController::class, 'productRequestDetail']);
    Route::get('/productRequestUpdate/{id}', [AdminController::class, 'productRequestUpdate']);
    Route::get('/product/{id}', [AdminController::class, 'productDetail']);
    Route::delete('delete-product', [AdminController::class, 'delete']);
    Route::delete('category-product', [AdminController::class, 'delete_cat']);
    Route::delete('delete-brand', [AdminController::class, 'delete_brand']);

    Route::get('/user', [AdminController::class, 'user']);
    Route::get('/user/{id}', [AdminController::class, 'userDetail']);
});