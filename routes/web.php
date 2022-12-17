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

    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    })->name('welcome');


Route::get("/test",function (){

    return \inertia("test");
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/account', [\App\Http\Controllers\UserAccountController::class,'index'])->name('account');

    // user addresses
    Route::resource('address',\App\Http\Controllers\UserAddressController::class)->only([
        'index','store','update','destroy'
    ]);

});


Route::post('setlocale',[\App\Http\Controllers\setLocale::class,'setLocale'])->name('setLocale')->withoutMiddleware('set.locale');

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
Route::get("/faq",function (){

    return \inertia("CompanyPages/Faq");
});
