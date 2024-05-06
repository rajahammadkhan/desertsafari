<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscriptionController;

//Fashion Redisplay
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SEOController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DicountCouponController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProcessingController;
use App\Http\Controllers\TotalUsersController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\EnquiryProdoctController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TourController;

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

Route::get('headings',[HeadingsController::class, 'index'])->name('Headings');
Route::get('/lole',[RoleController::class, 'supadm']);
Route::group(['middleware' => ['auth']], function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //user managment 
        Route::group(['middleware' => ['can:Users']], function () {
            Route::get('/users', [UserController::class, 'index'])->name('user');
            Route::get('/users/datatable', [UserController::class, 'datatable'])->name('user.datatable');
        });
        Route::group(['middleware' => ['can:users-add']], function () {
            Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
            Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
        });

        Route::group(['middleware' => ['can:users-edit']], function () {
            Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
            Route::put('users/{user}/update', [UserController::class, 'update'])->name('user.update');
        });
        Route::group(['middleware' => ['can:users-delete']], function () {
            Route::delete('users/destroy', [UserController::class, 'destroy'])->name('user.destroy');
        });

        Route::group(['middleware' => ['can:user-status']], function () {
            Route::patch('users/status', [UserController::class, 'status'])->name('user.status');
        });

        Route::get('/users_data', [TotalUsersController::class, 'index'])->name('users_data');
        Route::get('/users_data/datatable', [TotalUsersController::class, 'datatable'])->name('user_data.datatable');
        Route::get('users_data/{user}/edit', [TotalUsersController::class, 'edit'])->name('user_data.edit');
        Route::put('users_data/{user}/update', [TotalUsersController::class, 'update'])->name('user_data.update');
        Route::delete('users_data/destroy', [TotalUsersController::class, 'destroy'])->name('user_data.destroy');

    //role managment 
        Route::group(['middleware' => ['can:Roles']], function () {
            Route::get('/roles', [RoleController::class, 'index'])->name('role');
            Route::get('/roles/datatable', [RoleController::class, 'datatable'])->name('role.datatable');
        });

        // role create route
        Route::group(['middleware' => ['can:roles-add']], function () {
            Route::get('/roles/create', [RoleController::class, 'create'])->name('role.create');
            Route::post('/roles/add', [RoleController::class, 'store'])->name('role.store');
        });

        // role edit route
        Route::group(['middleware' => ['can:roles-edit']], function () {
            Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
            Route::put('roles/{role}/update', [RoleController::class, 'update'])->name('role.update');
        });

        // role delete route
        Route::group(['middleware' => ['can:roles-delete']], function () {
            Route::delete('roles/destroy', [RoleController::class, 'destroy'])->name('role.destroy');
        });


        // All Visa
        Route::get('/visas', [VisaController::class, 'index'])->name('visas');
        Route::get('/visas/datatable', [VisaController::class, 'datatable'])->name('visa.datatable');
        Route::get('/visas/create', [VisaController::class, 'create'])->name('visa.create');
        Route::post('/visas/store', [VisaController::class, 'store'])->name('visa.store');
        Route::patch('/visas/status', [VisaController::class, 'status'])->name('visa.status');
        Route::get('/visas/{visa}/edit', [VisaController::class, 'edit'])->name('visa.edit');
        Route::put('/visas/{visa}/update', [VisaController::class, 'update'])->name('visa.update');
        Route::delete('/visas/destroy', [VisaController::class, 'destroy'])->name('visa.destroy');

        // All Activities
        Route::get('/activities', [ActivityController::class, 'index'])->name('activities');
        Route::get('/activities/datatable', [ActivityController::class, 'datatable'])->name('activitie.datatable');
        Route::get('/activities/create', [ActivityController::class, 'create'])->name('activitie.create');
        Route::post('/activities/store', [ActivityController::class, 'store'])->name('activitie.store');
        Route::patch('/activities/status', [ActivityController::class, 'status'])->name('activitie.status');
        Route::get('/activities/{activity}/edit', [ActivityController::class, 'edit'])->name('activitie.edit');
        Route::put('/activities/{activity}/update', [ActivityController::class, 'update'])->name('activitie.update');
        Route::delete('/activities/destroy', [ActivityController::class, 'destroy'])->name('activitie.destroy');

        Route::delete('/activities/imagedestroy', [ActivityController::class, 'imagedestroy'])->name('activityimage.destroy');
        Route::delete('/activities/featuredestroy', [ActivityController::class, 'featuredestroy'])->name('activityfeature.destroy');
        // All Packages
        Route::get('/packages', [PackageController::class, 'index'])->name('packages');
        Route::get('/packages/datatable', [PackageController::class, 'datatable'])->name('package.datatable');
        Route::get('/packages/create', [PackageController::class, 'create'])->name('package.create');
        Route::post('/packages/store', [PackageController::class, 'store'])->name('package.store');
        Route::patch('/packages/status', [PackageController::class, 'status'])->name('package.status');
        Route::get('/packages/{package}/edit', [PackageController::class, 'edit'])->name('package.edit');
        Route::put('/packages/{package}/update', [PackageController::class, 'update'])->name('package.update');
        Route::delete('/packages/destroy', [PackageController::class, 'destroy'])->name('package.destroy');

        Route::delete('/packages/imagedestroy', [PackageController::class, 'imagedestroy'])->name('packageimage.destroy');
        Route::delete('/packages/featuredestroy', [PackageController::class, 'featuredestroy'])->name('packagefeature.destroy');

        // All Tour
        Route::get('/tours', [TourController::class, 'index'])->name('tours');
        Route::get('/tours/datatable', [TourController::class, 'datatable'])->name('tour.datatable');
        Route::get('/tours/create', [TourController::class, 'create'])->name('tour.create');
        Route::post('/tours/store', [TourController::class, 'store'])->name('tour.store');
        Route::patch('/tours/status', [TourController::class, 'status'])->name('tour.status');
        Route::get('/tours/{tour}/edit', [TourController::class, 'edit'])->name('tour.edit');
        Route::put('/tours/{tour}/update', [TourController::class, 'update'])->name('tour.update');
        Route::delete('/tours/destroy', [TourController::class, 'destroy'])->name('tour.destroy');

        Route::delete('/tours/imagedestroy', [TourController::class, 'imagedestroy'])->name('tourimage.destroy');
        Route::delete('/tours/featuredestroy', [TourController::class, 'featuredestroy'])->name('tourfeature.destroy');

    //Products
        Route::group(['middleware' => ['can:Listings']], function () {
        
            Route::get('/products', [ProductController::class, 'index'])->name('products');
            Route::get('/products/datatable', [ProductController::class, 'datatable'])->name('product.datatable');
            Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
            Route::patch('/products/status', [ProductController::class, 'status'])->name('product.status');
            Route::patch('/products/popular', [ProductController::class, 'popular'])->name('product.popular');
            Route::patch('/products/arrival', [ProductController::class, 'arrival'])->name('product.arrival');
            Route::patch('/products/best_selling', [ProductController::class, 'best_selling'])->name('product.best_selling');
            Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
            Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('product.update');
            Route::delete('/products/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
            Route::patch('/products/featured', [ProductController::class, 'featured'])->name('product.featured'); 
        });

        Route::group(['middleware' => 'isSuperAdmin'], function () {
            Route::patch('/products/publish', [ProductController::class, 'publish'])->name('product.publish');
        });

    //Store Purchase
        Route::get('/stock_purchase/datatable', [ProcessingController::class ,'datatable'])->name('stock_purchase.datatable');
        Route::get('/stock_purchase', [ProcessingController::class ,'index'])->name('stock_purchase');
        Route::get('/stock_purchase/{processings}', [ProcessingController::class ,'show'])->name('stock_purchase.show');
        Route::put('/stock_purchase/{processings}/update', [ProcessingController::class, 'update'])->name('stock_purchase.update');
        Route::delete('/stock_purchase/destroy', [ProcessingController::class, 'destroy'])->name('stock_purchase.destroy');

        Route::post('/getDataDownloadBetweenDates', [ProcessingController::class, 'getDataDownloadBetweenDates'])->name('getDataDownloadBetweenDates');
        Route::delete('/deleteTransaction', [ProcessingController::class, 'destroy'])->name('deleteTransaction');
        Route::post('/sendemail', [ProcessingController::class, 'emailsent'])->name('sendemail');

    // Blogs
        Route::group(['middleware' => ['can:Blogs']], function () {
            Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
            Route::get('/blogs/datatable', [BlogController::class, 'datatable'])->name('blog.datatable');
        });
        Route::group(['middleware' => ['can:blogs-add']], function () {
            Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create');
            Route::post('/blogs/store', [BlogController::class, 'store'])->name('blog.store');
        });
        Route::group(['middleware' => ['can:blogs-edit']], function () {
            Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
            Route::put('/blogs/{blog}/update', [BlogController::class, 'update'])->name('blog.update');
        });
        Route::group(['middleware' => ['can:blogs-delete']], function () {
            Route::delete('/blogs/destroy', [BlogController::class, 'destroy'])->name('blog.destroy'); 
        });
        Route::group(['middleware' => ['can:blogs-status']], function () {
            Route::patch('/blogs/status', [BlogController::class, 'status'])->name('blog.status');
        });
    
///////////////

    // Discount
        Route::get('/discounts', [DicountCouponController::class, 'index'])->name('discounts');
        Route::get('/discounts/datatable', [DicountCouponController::class, 'datatable'])->name('discount.datatable');
        Route::get('/discounts/create', [DicountCouponController::class, 'create'])->name('discount.create');
        Route::post('/discounts/store', [DicountCouponController::class, 'store'])->name('discount.store');
        Route::get('/discounts/{discount}/edit', [DicountCouponController::class, 'edit'])->name('discount.edit');
        Route::put('/discounts/{discount}/update', [DicountCouponController::class, 'update'])->name('discount.update');
        Route::delete('/discounts/destroy', [DicountCouponController::class, 'destroy'])->name('discount.destroy'); 
    
///////////////
    //SEO
        Route::group(['middleware' => ['can:SEO']], function () {
            Route::get('/seo', [SEOController::class, 'index'])->name('seo');
            Route::get('/seo/datatable', [SEOController::class, 'datatable'])->name('seo.datatable');           
        });
        // Route::group(['middleware' => ['can:SEO-add']], function () {
           
           
        // });
        Route::group(['middleware' => ['can:SEO-edit']], function () {
            Route::get('seo/{slug}/edit', [SEOController::class, 'edit'])->name('seo.edit');
            Route::put('seo/{slug}/update', [SEOController::class, 'update'])->name('seo.update');           
        });

        Route::group(['middleware' => ['can:user-status']], function () {
            Route::patch('users/status', [UserController::class, 'status'])->name('user.status');
        });
        Route::group(['middleware' => ['can:users-delete']], function () {
            Route::delete('users/destroy', [UserController::class, 'destroy'])->name('user.destroy');
        });

    //Settings
        Route::group(['middleware' => ['can:Settings']], function () {
            Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
        });
        Route::group(['middleware' => ['can:Settings-Edit']], function () {
            Route::put('/settings/update', [SettingsController::class, 'update'])->name('settings.update');
        });


    //Contact
        Route::group(['middleware' => ['can:Contact-Contact']], function () {
            Route::get('/contact/datatable', [ContactController::class ,'datatable'])->name('contact.datatable');
            Route::get('/contact', [ContactController::class ,'index'])->name('contact');
        });
        Route::group(['middleware' => ['can:Contact-delete']], function () {
            Route::delete('/contact/destroy', [ContactController::class, 'destroy'])->name('contact.destroy');
        });

    //Contact
        Route::group(['middleware' => ['can:Contact-Contact']], function () {
            Route::get('/subscription/datatable', [SubscriptionController::class ,'datatable'])->name('subscription.datatable');
            Route::get('/subscription', [SubscriptionController::class ,'index'])->name('subscription');
        });
        Route::group(['middleware' => ['can:Contact-delete']], function () {
            Route::delete('/subscription/destroy', [SubscriptionController::class, 'destroy'])->name('subscription.destroy');
        });

    //Enquiry
    Route::get('/enquiry/datatable', [EnquiryProdoctController::class ,'datatable'])->name('enquiry.datatable');
    Route::get('/enquiry', [EnquiryProdoctController::class ,'index'])->name('enquiry');
    Route::delete('/enquiry/destroy', [EnquiryProdoctController::class, 'destroy'])->name('enquiry.destroy');
        
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');

Route::get('/signup', [SignUpController::class, 'index'])->name('signup');
Route::post('/signup/store', [SignUpController::class, 'signup'])->name('signup.store');