<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RiviewController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserpanelController;


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

Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
Route::get('view-product', [App\Http\Controllers\UserController::class, 'product']);
Route::get('view-product/{name}', [App\Http\Controllers\UserController::class, 'productname']);
Route::get('view-category/{slug}', [App\Http\Controllers\UserController::class, 'viewcate']);
Route::get('view-product/{slug}', [App\Http\Controllers\UserController::class, 'viewpro']);
Route::get('view-product/{cate_slug}/{prod_slug}', [App\Http\Controllers\UserController::class, 'viewproduct']);
Route::post('add-to-cart', [CartController::class, 'addproduct']);
Route::post('delete-cart-item', [CartController::class, 'deletecart']);
Route::post('update-cart', [CartController::class, 'updatecart']);
Route::post('add-to-wishlist', [WishlistController::class, 'add']);
Route::post('delete-wishlist-item', [WishlistController::class, 'deletewishlist']);

Route::get('load-cart-data', [CartController::class, 'cartcount']);
Route::get('load-wishlist-data', [WishlistController::class, 'wishlistcount']);




Route::middleware(['auth'])->group(function (){
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeorder']);
    Route::get('my-order', [OrderController::class, 'index']);
    Route::get('view-order/{id}', [OrderController::class, 'vieworder']);
    Route::get('wishlist', [WishlistController::class, 'index']);
    Route::post('proceed-top-pay', [CheckoutController::class, 'pay']);
    Route::post('add-rating', [RatingController::class, 'add']);
    Route::get('add-riview/{product_slug}/userriview', [RiviewController::class, 'add']);
    Route::post('add-riview', [RiviewController::class, 'create']);
    Route::get('edit-riview/{product_slug}/userriview', [RiviewController::class, 'edit']);
    Route::put('update-riview', [RiviewController::class, 'update_riview']);




});
Auth::routes();
Route::group(['middleware' => ['auth','isAdmin']],function (){
    //dashboard admin
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //category
    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'add']);
    Route::post('insert-category', [App\Http\Controllers\Admin\CategoryController::class, 'insert']);
    Route::get('category/show{id}', [App\Http\Controllers\Admin\CategoryController::class, 'show']);
    Route::put('update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('category/delete{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);
    //product
    Route::get('product', [App\Http\Controllers\Admin\ProductController::class, 'index']);
    Route::get('product-add', [App\Http\Controllers\Admin\ProductController::class, 'add']);
    Route::post('product-insert', [App\Http\Controllers\Admin\ProductController::class, 'insert']);
    Route::get('product-show{id}', [App\Http\Controllers\Admin\ProductController::class, 'show']);
    Route::put('product-update{id}', [App\Http\Controllers\Admin\ProductController::class, 'update']);
    Route::get('product-delete{id}', [App\Http\Controllers\Admin\ProductController::class, 'delete']);
    Route::get('laporan', [App\Http\Controllers\Admin\LaporanController::class, 'index']);
    Route::get('add-laporan', [App\Http\Controllers\Admin\LaporanController::class, 'add']);
    Route::post('insert-laporan', [App\Http\Controllers\Admin\LaporanController::class, 'insert']);
    Route::get('/laporan/delete{id}', [App\Http\Controllers\Admin\LaporanController::class, 'delete']);
    Route::get('orders', [OrdersController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrdersController::class, 'view']);
    Route::PUT('update-order/{id}', [OrdersController::class, 'updateOrder']);
    Route::get('order-history', [OrdersController::class, 'orderhistory']);
    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-user/{id}', [DashboardController::class, 'viewuser']);



});





