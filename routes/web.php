<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;


//Frontend route..............
Route::get('/', [HomeController::class, 'index']);

// Admin route................
Route::get('/admin', [AdminController::class, 'login']);
Route::get('/dashboard', [AdminController::class, 'index']);
Route::post('/admin-dashboard', [AdminController::class, 'AdminDashboard']);
Route::get('/admin-logout', [AdminController::class, 'AdminLogout']);

//category route...............
Route::get('/add-category', [CategoryController::class, 'AddCategory']);
Route::post('/store-category', [CategoryController::class, 'StoreCategory']);
Route::get('/all-category', [CategoryController::class, 'AllCategory']);
Route::get('/inactive-category/{category_id}', [CategoryController::class, 'InactiveCategory']);
Route::get('/active-category/{category_id}', [CategoryController::class, 'ActiveCategory']);
Route::get('/edit-category/{category_id}', [CategoryController::class, 'EditCategory']);
Route::post('/update-category/{category_id}', [CategoryController::class, 'UpdateCategory']);
Route::get('/delete-category/{category_id}', [CategoryController::class, 'DeleteCategory']);

//product route...............
Route::get('/add-product', [ProductController::class, 'AddProduct']);
Route::post('/store-product', [ProductController::class, 'StoreProduct']);
Route::get('/all-product', [ProductController::class, 'AllProduct']);
Route::get('/inactive-product/{product_id}', [ProductController::class, 'InactiveProduct']);
Route::get('/active-product/{product_id}', [ProductController::class, 'ActiveProduct']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'EditProduct']);
Route::post('/update-product/{product_id}', [ProductController::class, 'UpdateProduct']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'DeleteProduct']);

//Slider route...............
Route::get('/add-slider', [SliderController::class, 'AddSlider']);
Route::post('/store-slider', [SliderController::class, 'StoreSlider']);
Route::get('/all-slider', [SliderController::class, 'AllSlider']);
Route::get('/inactive-slider/{slider_id}', [SliderController::class, 'InactiveSlider']);
Route::get('/active-slider/{slider_id}', [SliderController::class, 'ActiveSlider']);
Route::get('/delete-slider/{slider_id}', [SliderController::class, 'DeleteSlider']);
Route::get('/settings', [SliderController::class, 'Setting']);
Route::post('/store-setting/{id}', [SliderController::class, 'StoreSetting']);

//show category & brand wise product route..............
Route::get('/product_by_category/{category_id}', [HomeController::class, 'show_product_by_category']);
Route::get('/product_by_brands/{brand_id}', [HomeController::class, 'show_product_by_brand']);
Route::get('/view-product/{product_id}', [HomeController::class, 'view_product']);

//cart route.............
Route::post('/add-to-cart', [CartController::class, 'AddToCart']);
Route::get('/show-cart', [CartController::class, 'ShowCart']);
Route::get('/delete-cart/{rowId}', [CartController::class, 'DeleteCart']);
Route::post('/update-cart', [CartController::class, 'UpdateCart']);

//checkout route...........
Route::get('/login-check', [CheckoutController::class, 'LoginCheck']);
Route::post('/customer-registration', [CheckoutController::class, 'Registration']);
Route::get('/checkout', [CheckoutController::class, 'Checkout']);
Route::post('/store-shipping-details', [CheckoutController::class, 'StoreShippingDetails']);
Route::post('/customer-login', [CheckoutController::class, 'CustomerLogin']);
Route::get('/customer-logout', [CheckoutController::class, 'CustomerLogout']);
Route::get('/payment', [CheckoutController::class, 'Payment']);
Route::post('/order-place', [CheckoutController::class, 'OrderPlace']);
Route::get('/manage-order', [CheckoutController::class, 'ManageOrder']);
Route::get('/view-order/{order_id}', [CheckoutController::class, 'ViewOrder']);
Route::get('/delete-order/{order_id}', [CheckoutController::class, 'DeleteOrder']);
Route::get('/success-order/{order_id}', [CheckoutController::class, 'SuccessOrder']);

// Booking Route............
Route::get('/booking', [SliderController::class, 'Booking']);
Route::post('/make-reservation', [SliderController::class, 'MakeReservation']);
Route::get('/booking-list', [SliderController::class, 'AllBook']);



