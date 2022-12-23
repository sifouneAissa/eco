<?php
use \Illuminate\Support\Facades\Route;


// route for admin
\Illuminate\Support\Facades\Route::group(['middleware' => ['web','inertia_share_admin'],'prefix' => config('app.admin-prefix'), 'as' => 'admin.'], function () {
    Route::get('/login',[\App\Http\Controllers\admin\AdminLoginController::class,'index'])->middleware('guest')->name('login');

    \Illuminate\Support\Facades\Route::group(['middleware' => 'set.admin'], function () {
        Route::get('/',[\App\Http\Controllers\admin\DashboardController::class,'index'])->name('index');
        Route::get('/test',[\App\Http\Controllers\admin\DashboardController::class,'index'])->name('test');

        // roles and permissions
//        Route::get('/role',[\App\Http\Controllers\admin\RoleController::class,'index'])->name('role.index');
        Route::resource('/role',\App\Http\Controllers\admin\RoleController::class)->only([
            'update','index','destroy'
        ]);
        Route::get('/roles',[\App\Http\Controllers\admin\RoleController::class,'datatables'])->name('roles.index');
        Route::get('/permissions',[\App\Http\Controllers\admin\PermissionController::class,'permissions'])->name('permissions.get');


    });
});






