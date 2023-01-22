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



Route::get('/', [\App\Http\Controllers\DashboardController::class,'index'])->name('welcome')->middleware('set.password');
Route::get('/welcometest', [\App\Http\Controllers\DashboardController::class,'index'])->name('welcometest');
Route::post('/skipsetpassword',function (){
    $time = \Illuminate\Support\Carbon::now();
    \Illuminate\Support\Facades\Session::put('time',$time);
})->name('skipsetpassword');

Route::get('/setpassword',function (){
    \Illuminate\Support\Facades\Session::put('time',0);
})->name('setpassword');

Route::post('/reviews',[\App\Http\Controllers\ReviewController::class,'store'])->name('review.store');




Route::middleware([
    'auth:sanctum',
    'set.password',
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

    Route::resource('/wishlist',\App\Http\Controllers\WishListController::class)->only(['index','destroy','store'
    ]);


    Route::get('redirects', [\App\Http\Controllers\LoginRedirectionController::class,'redirect'])->name('redirects');

});

Route::middleware([
 'set.password'
])->group(function (){
    // product
    Route::post('/addproduct',[\App\Http\Controllers\UserOrderController::class,'addProduct'])->name('addProduct');
    Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class,'show'])->name('product.show');
    Route::get('/products', [\App\Http\Controllers\ProductController::class,'index'])->name('product.index');
    Route::get('/checkout', [\App\Http\Controllers\UserOrderController::class,'checkout'])->name('checkout.show');
    Route::get('/thanks/{id}', [\App\Http\Controllers\UserOrderController::class,'thanks'])->name('thanks.show');



    Route::resource('/cartitem',\App\Http\Controllers\CartItemController::class)->only(
        'update','destroy','index'
    );
    Route::resource('/order',\App\Http\Controllers\UserOrderController::class)->only(
        'store'
    );
    Route::get('/listing', [\App\Http\Controllers\UserListingController::class,'index'])->name('listing');

    Route::post('setlocale',[\App\Http\Controllers\setLocale::class,'setLocale'])->name('setLocale')->withoutMiddleware('set.locale');
    Route::post('setcurrency',[\App\Http\Controllers\setLocale::class,'setCurrency'])->name('setCurrency')->withoutMiddleware('set.locale');

// Company pages components
Route::get('/blogs', [\App\Http\Controllers\BlogController::class,'index'])->name('blog.index');
Route::get('/blogs/{id}', [\App\Http\Controllers\BlogController::class,'show'])->name('blog.show');
Route::get("/contact-us",[\App\Http\Controllers\ContactUsController::class,'index'])->name('contact-us');
Route::post("/contact-us",[\App\Http\Controllers\ContactUsController::class,'store'])->name('contactus.store');
Route::get('/faq', [\App\Http\Controllers\FaqController::class,'index'])->name('faq');
    Route::get("/about-us",function (){

        return \inertia("CompanyPages/AboutUs");
    })->name('about-us');
    Route::get("/privacy-policy",function (){

        return \inertia("CompanyPages/PrivacyPolicy");
    })->name('privacy-policy');
    Route::get("/terms-conditions",function (){

        return \inertia("CompanyPages/TermsAndConditions");
    })->name('terms-conditions');
    Route::get("/shipping-policy",function (){

        return \inertia("CompanyPages/ReturnAndShippingPolicy");
    })->name('shipping-policy');
    //    Route::get('trackorder/{id}',[\App\Http\Controllers\TrackOrderController::class,'show'])->name('trackOrder');
    Route::get('trackorder',[\App\Http\Controllers\TrackOrderController::class,'index'])->name('trackOrder.index');
    Route::post('trackorder/redirect',[\App\Http\Controllers\TrackOrderController::class,'redirectTo'])->name('trackOrder.redirect');

    Route::post('/readall/notification',[\App\Http\Controllers\NotificationController::class,'readAll'])->name('notification.readall');
    Route::post('/readmessages/notification',[\App\Http\Controllers\NotificationController::class,'readAllMessages'])->name('notification.readAllMessages');

});


//...

Route::match(['get', 'post'], 'botman', [\App\Http\Controllers\BotManController::class, 'handle']);
Route::get('/test/chat',function (){
    return view('chat');
});

require __DIR__. "/admin.php";
