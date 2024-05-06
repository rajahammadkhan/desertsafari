<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GiftCardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReworkController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\CounterController;

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

Route::get('/feedback', function () {
    return view('feedback');
})->name('feedback');

Route::post('/feedback_increment', [CounterController::class, 'increment'])->name('increment');
Route::post('/feedback_disincrement', [CounterController::class, 'disincrement'])->name('disincrement');

Route::get('/ceo', function () {
    return view('ceo');
})->name('ceo');

Route::get('/term-condition', function () {
    return view('term_condition');
})->name('term_condition');

Route::get('/privacy-policy', function () {
    return view('privacy_policy');
})->name('privacy_policy');

Route::get('/cookie-policy', function () {
    return view('cookie_policy');
})->name('cookie_policy');

// Route::get('/single-product', function () {
//     return view('single-product');
// })->name('single-product');

// Route::get('/single-visa', function () {
//     return view('single-visa');
// })->name('single-visa');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/generate-pdf/{processingId}', [PDFController::class, 'generatePDF'])->name('generate-pdf');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/nav-elements', [NavigationController::class, 'index'])->name('nav');
Route::get('/nav-slug', [NavigationController::class, 'addSlug'])->name('nav-slug');

Route::get('/product/{category}/{subCategory}/{subSubCategory}', [ProductController::class, 'searchedIndex'])->name('product.product');
Route::get('/brand/{category}/{subCategory}/{subSubCategory}', [ProductController::class, 'searchedIndexbrand'])->name('product.productbrand');


  Route::get('search', [ActivityController::class, 'autosearch'])->name('search');

Route::get('/product-detail/{slug}',[ProductController::class, 'show'])->name('product-detail');

Route::get('/featured', function () {
    return view('featured');
})->name('featured');

Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::post('/contactsend', [ContactController::class, 'contactsend'])->name('contact-us');

Route::post('/subscriptionsend', [SubscriptionController::class, 'subscriptionsend'])->name('subscription-form');

Route::get('/brands', [BrandController::class, 'index'])->name('brands');

Route::get('/blog',[BlogController::class, 'index'])->name('blog');

Route::get('/blogdetails/{slug}',[BlogController::class, 'detail'])->name('blog.post');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/customer-service', function () {
    return view('customer-service');
})->name('customer-service');

Route::get('/faqs', function () {
    return view('faqs');
})->name('faqs');

Route::get('/track-order', function () {
    return view('track-order');
})->name('track-order');

Route::get('/activity', [ActivityController::class, 'index'])->name('product');

Route::get('/packages', [ActivityController::class, 'packages'])->name('packages');

Route::get('/tours', [ActivityController::class, 'tours'])->name('tours');

Route::get('/visa', [VisaController::class, 'index'])->name('visa');


Route::get('activites/{slug}',
    [ActivityController::class, 'getActivity']
)->name('get_activity');

Route::post('/enquirysend', [VisaController::class, 'enquirysend'])->name('enquiry-us');

Auth::routes();

    Route::get('/cart', [CartsController::class, 'cart'])->name('cart');
    Route::post('/apply-coupon', [CartsController::class, 'modifyapplycoupon'])->name('applycoupon');

    Route::get('/cart/get/items', [CartsController::class, 'getCartItemsForCart']);
    Route::delete('/cart/{id}', [CartsController::class, 'destroy'])->name('cart.destroy');

    Route::delete('remove-from-cart', [CartsController::class, 'remove'])->name('remove.from.cart');
    
    Route::get('/checkout', [CartsController::class, 'index'])->name('checkout');
    Route::get('/checkout/get/items', [CartsController::class, 'getCartItemsForCheckout']);

    Route::post('/process/user/payment', [CartsController::class, 'processPayment']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('profile/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('profile/{user}', [UserController::class, 'update'])->name('user.update');

    Route::get('/profile/',[UserController::class, 'order_list'])->name('order_list');

    Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist');

    Route::get('/wishlist/get/items', [WishlistController::class, 'getWishlistItemsForWishlist']);
    Route::delete('/wishlist/{id}', [WishlistController::class, 'wishlistdestroy'])->name('wishlist.destroy');
});
    
    // Route::post('/get-price', [CartsController::class, 'getPrice'])->name('get.price');
    // Route::post('/get-price', [CartsController::class, 'getPrice'])->middleware('web');


    Route::post('/add-to-cart', [CartsController::class, 'addToCart']);
  

Route::post('/service/search',
    [HomeController::class, 'search']
)->name('activity.search');

Route::post('/activity-type/search',
    [HomeController::class, 'typesearch']
)->name('typeactivity.search');

Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

Route::get('/{slug}',
    [VisaController::class, 'getVisa']
)->name('get_visa');