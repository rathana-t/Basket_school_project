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
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/reg', [HomeController::class, 'reg']);
Route::get('/product/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/product', [HomeController::class, 'products'])->name('products');
Route::get('/product/product/{id}', [HomeController::class, 'detail'])->name('productItem');
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/cart', [HomeController::class, 'cart'])->name('route_cart')->middleware('checker');
Route::post('/search-filter', [HomeController::class, 'search_filter'])->name('search-filter');
Route::get('/search', [HomeController::class, 'search']);
Route::get('/order/{id}', [HomeController::class, 'order']);
Route::get('/category', [HomeController::class, 'category'])->name('category');
Route::get('/category/{id}', [HomeController::class, 'categoryItem'])->name('categoryItem');
Route::get('/smallcate', [HomeController::class, 'smallcate'])->name('smallcate');
Route::get('/smallcate/{id}', [HomeController::class, 'smallcateItem']);
Route::get('/brand/{id}', [HomeController::class, 'brand'])->name('brandItem');
Route::get('/brand', [HomeController::class, 'allBrand'])->name('brands');
Route::get('/store', [HomeController::class, 'store']);

Route::post('/signin', [UserController::class, 'signin'])->name("signin");
Route::post('/register', [UserController::class, 'register'])->name("register");
Route::get('/profile/{id}', [UserController::class, 'profile'])->name('display-profile')->middleware('checker');
// Route::get('/edit/{id}', [UserController::class, 'edit_profile'])->name('edit-profile');
Route::post('/update/{id}', [UserController::class, 'update_profile'])->name('update-profile');
Route::get('/history-order/{id}', [UserController::class, 'history_order'])->name('order-history');
Route::get('/wishlist', [UserController::class, 'wish_list'])->name('list-wish');
Route::get('/changepassword/{id}', [UserController::class, 'ch_password'])->name('change-password');
Route::post('/confirmChange/{id}', [UserController::class, 'confirm_ch'])->name('confirm-change');
Route::get('/logout', [UserController::class, 'logout'])->middleware('checker');
Route::delete('remove-cart', [CartController::class, 'remove_cart']);
Route::delete('remove-wishlist', [CartController::class, 'remove_wishlist']);
Route::post('edit-quantity-cart', [CartController::class, 'edit_cart_quantity']);

//=============Seller===================

Route::post('/add-to-cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::post('/add-to-widhlist', [CartController::class, 'add_to_widhlist'])->name('add_to_wishlist');;
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
    Route::delete('delete-se_cate_id', [AdminController::class, 'delete_se_cate']);

    Route::get('/user', [AdminController::class, 'user']);
    Route::get('/user/{id}', [AdminController::class, 'userDetail']);
});