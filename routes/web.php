<?php

use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CheckoutPaymentController;
use App\Http\Controllers\CheckoutSuccessController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\subscriptions\SubscriptionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('/store', [ProductController::class, 'index'])->name('products.index');
Route::get('/store/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');

Route::get('/products', [ProductController::class, 'index'])->name('store.index');

Route::get('/details/{id}', [DetailController::class, 'index'])->name('shop.details');

// WHAT DOES THIS ROUTE DO?
Route::get('subscriptions', [SubscriptionController::class, 'index'])->name('subscription.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::put('/cart', [CartController::class, 'store'])->name('cart.store');

    Route::get('/cart/add/{id}', [CartController::class, 'addToCartFromStore'])->name('cart.addfromstorepage');

    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    Route::post('/checkout/points', [CheckoutController::class, 'points'])->name('checkout.points');

    Route::post('/checkout/payment/{payment}/1', [CheckoutPaymentController::class, 'index'])->name('checkout.stripe');

    Route::get('/checkout/{payment}/testing', [CheckoutPaymentController::class, 'index'])->name('checkout.success.testing');

    Route::get('/checkout/success/{id}', [CheckoutSuccessController::class, 'index'])->name('checkout.success');

    // comments here
    Route::post('subscriptions/{id}', [SubscriptionController::class, 'purchase'])->name('subscriptions.purchase');

    // comments here
    Route::get('subscriptions/success/{id}', [SubscriptionController::class, 'success'])->name('subscriptions.success');

    // Route to show details for an order
    Route::get('/order-history', [OrderHistoryController::class, 'index'])->name('order-history.index');
    Route::get('/order-history/{id}', [OrderHistoryController::class, 'show'])->name('order-history.show');
});

// Route to show the Admin Page
Route::prefix('admins')->middleware(['auth', 'isAdmin'])->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class);
});
