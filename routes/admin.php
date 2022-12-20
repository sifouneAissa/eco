<?php
use \Illuminate\Support\Facades\Route;


// route for admin
\Illuminate\Support\Facades\Route::group(['middleware' => ['web','inertia_share_admin'],'prefix' => config('app.admin-prefix'), 'as' => 'admin.'], function () {
    Route::get('/login',[\App\Http\Controllers\admin\AdminLoginController::class,'index'])->middleware('guest')->name('login');

    \Illuminate\Support\Facades\Route::group(['middleware' => 'set.admin'], function () {
        Route::get('/',[\App\Http\Controllers\admin\DashboardController::class,'index'])->name('index');
    });
});






