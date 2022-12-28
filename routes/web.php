<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [\App\Http\Controllers\DashboardController::class,'index'])->name('welcome');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/account', [\App\Http\Controllers\UserAccountController::class,'index'])->name('account');
//    Route::get('/store', [\App\Http\Controllers\UserStoreController::class,'index'])->name('store');

    // user addresses
    Route::resource('address',\App\Http\Controllers\UserAddressController::class)->only([
        'index','store','update','destroy'
    ]);


    Route::get('redirects', [\App\Http\Controllers\LoginRedirectionController::class,'redirect'])->name('redirects');

});

// product
Route::post('/addproduct',[\App\Http\Controllers\UserOrderController::class,'addProduct'])->name('addProduct');
Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class,'show'])->name('product.show');
Route::get('/products', [\App\Http\Controllers\ProductController::class,'index'])->name('product.index');
Route::get('/checkout', [\App\Http\Controllers\UserOrderController::class,'checkout'])->name('checkout.show');


Route::get('/listing', [\App\Http\Controllers\UserListingController::class,'index'])->name('listing');

Route::post('setlocale',[\App\Http\Controllers\setLocale::class,'setLocale'])->name('setLocale')->withoutMiddleware('set.locale');
Route::post('setcurrency',[\App\Http\Controllers\setLocale::class,'setCurrency'])->name('setCurrency')->withoutMiddleware('set.locale');

// Company pages components
Route::get("/contact-us",function (){

    return \inertia("CompanyPages/ContactUs");
});
Route::get("/about-us",function (){

    return \inertia("CompanyPages/AboutUs");
});
Route::get("/privacy-policy",function (){

    return \inertia("CompanyPages/PrivacyPolicy");
});
Route::get("/terms-conditions",function (){

    return \inertia("CompanyPages/TermsAndConditions");
});
Route::get("/shipping-policy",function (){

    return \inertia("CompanyPages/ReturnAndShippingPolicy");
});
Route::get("/faq",function (){

    return \inertia("CompanyPages/Faq");
});
Route::get('trackorder/{id}',[\App\Http\Controllers\TrackOrderController::class,'show'])->name('trackOrder');

Route::post('/readall/notification',[\App\Http\Controllers\NotificationController::class,'readAll'])->name('notification.readall');

require __DIR__. "/admin.php";
