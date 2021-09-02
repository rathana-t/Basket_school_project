<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuildPcController;
use App\Http\Controllers\ForgetPassword;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

Route::get('/test', function () {
    // var_dump('time' . new DataTime);
    return view('test');
    // var_dump('time' . date("Y m d H:i:s"));

});
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/reg', [HomeController::class, 'reg']);
Route::get('/product/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/product', [HomeController::class, 'products'])->name('products');
Route::get('/product/product/{id}', [HomeController::class, 'detail'])->name('productItem');
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/cart', [HomeController::class, 'cart'])->name('route_cart')->middleware('checker');
Route::any('/search-filter', [HomeController::class, 'search_filter'])->name('search-filter');
Route::get('/search', [HomeController::class, 'search']);
Route::get('/category', [HomeController::class, 'category'])->name('category');
Route::get('/category/{id}', [HomeController::class, 'categoryItem'])->name('categoryItem');
Route::get('/category/{id}/product/{id1}', [HomeController::class, 'detail2'])->name('categoryProductItem');
Route::get('/smallcate', [HomeController::class, 'smallcate'])->name('smallcate');
Route::get('/smallcate/{id}', [HomeController::class, 'smallcateItem'])->name('smallcateItem');
Route::get('/smallcate/{id}/product/{id1}', [HomeController::class, 'detail3'])->name('smallcateProductItem');
Route::get('/brand/{id}', [HomeController::class, 'brand'])->name('brandItem');
Route::get('/brand/{id}/product/{id1}', [HomeController::class, 'detail4'])->name('brandProductItem');
Route::get('/brand', [HomeController::class, 'allBrand'])->name('brands');
Route::get('/store/{id}', [HomeController::class, 'store']);
Route::get('/delete-order/{id}', [OrderController::class, 'delete_card']);

Route::post('/signin', [UserController::class, 'signin'])->name("signin");
Route::post('/register', [UserController::class, 'register'])->name("register");
Route::get('/profile', [UserController::class, 'profile'])->name('display-profile')->middleware('checker');
// Route::get('/edit/{id}', [UserController::class, 'edit_profile'])->name('edit-profile');
Route::get('/order', [UserController::class, 'order']);
Route::post('/update/{id}', [UserController::class, 'update_profile'])->name('update-profile');
Route::get('/history-order', [UserController::class, 'history_order'])->name('order-history');
Route::get('/wishlist', [UserController::class, 'wish_list'])->name('list-wish');
Route::get('/changepassword', [UserController::class, 'ch_password'])->name('change-password');
Route::post('/confirmChange/{id}', [UserController::class, 'confirm_ch'])->name('confirm-change');
Route::get('/switchAccount', [UserController::class, 'switch_acc'])->name('switch-acc');
Route::post('/acceptSwitch', [UserController::class, 'accept_switch'])->name('accept');
Route::get('/logout', [UserController::class, 'logout'])->middleware('checker');
Route::delete('remove-cart', [CartController::class, 'remove_cart']);
Route::delete('remove-wishlist', [CartController::class, 'remove_wishlist']);
Route::post('edit-quantity-cart', [CartController::class, 'edit_cart_quantity']);
Route::get('/confirm-order-product', [UserController::class, 'confirm_order_prooduct']);
Route::post('/order-product', [OrderController::class, 'order']);
Route::get('/user_cancel_order/{id}', [OrderController::class, 'user_cancel_order'])->middleware('checker');

Route::get('/user_forget_pass', [ForgetPassword::class, 'user_forget_pass']);
Route::post('/user_forget-password', [ForgetPassword::class, 'user_postEmail']);
Route::get('user_reset-password/{token}', [ForgetPassword::class, 'user_getPassword']);
Route::post('user_reset-password', [ForgetPassword::class, 'user_updatePassword']);

Route::get('/forget_pass', [ForgetPassword::class, 'forget_pass']);
Route::post('/forget-password', [ForgetPassword::class, 'postEmail']);
Route::get('reset-password/{token}', [ForgetPassword::class, 'getPassword']);
Route::post('reset-password', [ForgetPassword::class, 'updatePassword']);
//=============Seller===================

Route::get('/seller_login/{test}', [AdminController::class, 'seller_login']);

Route::post('/seller/editImage', [SellerController::class, 'edit_image']);

Route::post('/add-to-cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::post('/add-to-wishlist', [CartController::class, 'add_to_wishlist'])->name('add_to_wishlist');
Route::get('/add-to-wishlist2/{id}/product/{id2}', [CartController::class, 'add_to_wishlist2'])->name('add_to_wishlist2');
Route::get('/sellerLogInPage', [SellerController::class, 'login_page'])->name('login_page');
Route::get('/sellerRegisterPage', [SellerController::class, 'register_page']);
Route::post('/sellerLogIn', [SellerController::class, 'login']);
Route::post('/sellerRegister', [SellerController::class, 'register']);
Route::get('/logout_seller', [SellerController::class, 'logout'])->middleware('checker_seller');
Route::get('/forseller', [SellerController::class, 'forseller']);
Route::post('/confirm-pending', [SellerController::class, 'con_pending']);
Route::post('/confirm-processing-to-delivery', [SellerController::class, 'con_processing']);
Route::post('/cancel-pending', [SellerController::class, 'cancel_pending']);
Route::get('/remove-cancel/{id}', [SellerController::class, 'remove_cancel']);
Route::get('/remove-oldorder/{id}', [SellerController::class, 'remove_old_order']);
Route::get('/delete_user_cancel_order/{id}', [SellerController::class, 'delete_user_cancel_order']);

Route::get('/seller/dashboard', [SellerController::class, 'dashboard'])->middleware('checker_seller');
Route::get('/seller/products', [SellerController::class, 'products'])->middleware('checker_seller');
Route::get('/seller/productPending', [SellerController::class, 'productPending'])->middleware('checker_seller');
Route::get('/seller/choose-category', [SellerController::class, 'choose_main_cate'])->middleware('checker_seller');
Route::get('/seller/add-product/{id}', [SellerController::class, 'add_product'])->middleware('checker_seller');
Route::post('/seller/postProduct/{id}', [SellerController::class, 'postProduct'])->name('sellerpostProduct');
Route::get('/seller/new-order', [SellerController::class, 'new_order'])->middleware('checker_seller');
Route::get('/seller/processing', [SellerController::class, 'order_processing'])->middleware('checker_seller');
Route::get('/seller/old-order', [SellerController::class, 'old_order'])->middleware('checker_seller');
Route::get('/seller/profile', [SellerController::class, 'profile'])->middleware('checker_seller');
Route::get('/seller/editProfile', [SellerController::class, 'edit_profile'])->middleware('checker_seller');
Route::post('/seller/accept-change', [SellerController::class, 'accept_change'])->name('acceptChange');
Route::get('/seller/messages', [SellerController::class, 'sellerMessages'])->middleware('checker_seller');
Route::get('/seller/messages/{id}', [SellerController::class, 'detailMsg'])->middleware('checker_seller');
Route::get('/edit/product/{id}', [AdminController::class, 'edit'])->name('edit_product')->middleware('checker_seller');
Route::post('/update/product/{id}', [ProductController::class, 'update'])->name('update_pro')->middleware('checker_seller');

Route::prefix('CustomPC')->group(function () {
    Route::get('product', [BuildPcController::class, 'go_away']);
    Route::post('product', [BuildPcController::class, 'get_item_by_se_cate']);
    Route::get('/Builder', [BuildPcController::class, 'build_pc'])->name('build_pc')->middleware('checker');
    Route::get('/select/{id}/{second}/{A_R}', [BuildPcController::class, 'select_item']);
    Route::get('/remove/{id}', [BuildPcController::class, 'remove']);
    Route::get('/add_to_cart', [BuildPcController::class, 'add_to_cart'])->name('add_to_cart_build');
    Route::post('/search-filter', [BuildPcController::class, 'search']);
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->middleware('admin');
    Route::get('/brand', [AdminController::class, 'brand'])->middleware('admin');
    Route::get('/brand/{id}', [AdminController::class, 'brandItem'])->middleware('admin');
    Route::get('/add-brand', [AdminController::class, 'addBrand'])->middleware('admin');
    Route::post('/add-brand', [AdminController::class, 'storeBrand'])->name('brand.store')->middleware('admin');
    Route::get('/category', [AdminController::class, 'category'])->middleware('admin');
    Route::get('/add-category', [AdminController::class, 'addCategory'])->middleware('admin');
    Route::post('/store-category', [AdminController::class, 'storeCategory'])->name('category_store')->middleware('admin');

    Route::post('/sendMsg', [AdminController::class, 'sendMsg'])->name('sendMsg')->middleware('admin');

    Route::get('/secondary-category', [AdminController::class, 'secondaryCategory'])->middleware('admin');
    Route::get('/add-secondarycategory', [AdminController::class, 'addSecondaryCategory'])->middleware('admin');
    Route::post('/store-Secondcategory', [AdminController::class, 'storeSecondCategory'])->name('secondcategory_store')->middleware('admin');
    
    Route::get('/shop', [AdminController::class, 'shop'])->middleware('admin');
    Route::get('/shopPending', [AdminController::class, 'shop_pending'])->name('shop_pending')->middleware('admin');
    Route::get('/shopDetail/{id}', [AdminController::class, 'shop_detail'])->middleware('admin');
    Route::post('/shopconfirm/{id}', [AdminController::class, 'shopConfirm'])->middleware('admin');
    Route::post('/shopreject/{id}', [AdminController::class, 'shopReject'])->middleware('admin');


    // Route::get('/seller', [AdminController::class, 'seller'])->middleware('admin');
    Route::get('/seller/{id}', [AdminController::class, 'sellerDetail'])->name('sellerHasProduct')->middleware('admin');

    Route::get('/product', [AdminController::class, 'product'])->middleware('admin');
    Route::get('/productRequest', [AdminController::class, 'productRequest'])->middleware('admin');
    Route::get('/productRequest/{id}', [AdminController::class, 'productRequestDetail'])->middleware('admin');
    Route::get('/productRequestUpdate/{id}', [AdminController::class, 'productRequestUpdate'])->middleware('admin');
    Route::post('/productRequestReject/{id}', [AdminController::class, 'productRequestReject'])->middleware('admin');
    Route::get('/product/{id}', [AdminController::class, 'productDetail'])->middleware('admin');
    Route::delete('delete-product', [AdminController::class, 'delete'])->middleware('admin');
    Route::delete('category-product', [AdminController::class, 'delete_cat'])->middleware('admin');
    Route::delete('delete-brand', [AdminController::class, 'delete_brand'])->middleware('admin');
    Route::delete('delete-se_cate_id', [AdminController::class, 'delete_se_cate'])->middleware('admin');

    Route::get('/user', [AdminController::class, 'user'])->middleware('admin');
    Route::get('/user/{id}', [AdminController::class, 'userDetail'])->middleware('admin');
});