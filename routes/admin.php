<?php
use \Illuminate\Support\Facades\Route;


// route for admin
\Illuminate\Support\Facades\Route::group(['middleware' => ['web','inertia_share_admin'],'prefix' => config('app.admin-prefix'), 'as' => 'admin.'], function () {
    Route::get('/login',[\App\Http\Controllers\admin\AdminLoginController::class,'index'])->middleware('guest')->name('login');

    \Illuminate\Support\Facades\Route::group(['middleware' => 'set.admin'], function () {
        Route::get('/',[\App\Http\Controllers\admin\DashboardController::class,'index'])->name('index');
        Route::get('/dashboard/orders',[\App\Http\Controllers\admin\DashboardController::class,'datatables'])->name('dashboard.orders');
        Route::get('/test',[\App\Http\Controllers\admin\DashboardController::class,'index'])->name('test');
        Route::post('/logout',[\App\Http\Controllers\admin\AdminLoginController::class,'logout'])->name('logout');

        // roles and permissions

        Route::resource('/role',\App\Http\Controllers\admin\RoleController::class)->only([
            'update','index','destroy','store'
        ]);
        Route::get('/roles',[\App\Http\Controllers\admin\RoleController::class,'datatables'])->name('roles.index');

        Route::resource('/permission',\App\Http\Controllers\admin\PermissionController::class)->only([
            'index'
        ]);
        Route::get('/permissions',[\App\Http\Controllers\admin\PermissionController::class,'datatables'])->name('permissions.index');

        Route::resource('/user',\App\Http\Controllers\admin\UserController::class)->only([
            'index','store','update','destroy'
        ]);
        Route::get('/users',[\App\Http\Controllers\admin\UserController::class,'datatables'])->name('users.index');

        Route::resource('/client',\App\Http\Controllers\admin\ClientController::class)->only([
            'index','store','update','destroy'
        ]);
        Route::get('/clients',[\App\Http\Controllers\admin\ClientController::class,'datatables'])->name('clients.index');

        Route::resource('/product',\App\Http\Controllers\admin\ProductController::class)->only([
            'index'
            ,'store'
            ,'update'
            ,'destroy'
        ]);
        Route::get('/products',[\App\Http\Controllers\admin\ProductController::class,'datatables'])->name('products.index');
        Route::resource('/setting',\App\Http\Controllers\admin\SettingController::class)->only([
            'index'
            // ,'store'
            ,'update'
            // ,'destroy'
        ]);
        Route::get('/settings',[\App\Http\Controllers\admin\SettingController::class,'datatables'])->name('settings.index');

        Route::resource('/question',\App\Http\Controllers\admin\QuestionController::class)->only([
            'index'
             ,'store'
            ,'update'
             ,'destroy'
        ]);
        Route::get('/questions',[\App\Http\Controllers\admin\QuestionController::class,'datatables'])->name('questions.index');

        Route::resource('/category',\App\Http\Controllers\admin\ProductCategoryController::class)->only([
            'index'
            ,'store'
            ,'update'
            ,'destroy'
        ]);
        Route::get('/categories',[\App\Http\Controllers\admin\ProductCategoryController::class,'datatables'])->name('categories.index');

        // media
        Route::get('/media/{model}',[\App\Http\Controllers\admin\MediaController::class,'index'])->name('media.index');

        Route::post('/media/{id}',[\App\Http\Controllers\admin\MediaController::class,'update'])->name('media.update');
        Route::post('/mediaorder',[\App\Http\Controllers\admin\MediaController::class,'orderMedia'])->name('media.order');

        Route::resource('/media',\App\Http\Controllers\admin\MediaController::class)->only([
            'store','destroy'
        ]);

        Route::resource('/order',\App\Http\Controllers\admin\OrderDetailController::class)->only([
            'index','show'
        ]);
        Route::resource('/message',\App\Http\Controllers\admin\UserMessageController::class)->only([
            'index','destroy'
        ]);
        Route::patch('/messageread/{id}',[\App\Http\Controllers\admin\UserMessageController::class,'readAt'])->name('message.read_at');
        Route::get('/orders',[\App\Http\Controllers\admin\OrderDetailController::class,'datatables'])->name('orders.index');

        Route::get('/blogs',[\App\Http\Controllers\admin\BlogController::class,'datatables'])->name('blogs.index');
        Route::resource('/blog',\App\Http\Controllers\admin\BlogController::class)->only([
            'index',
            'create'
            ,'store'
            , 'edit'
            ,'update'
            ,'show'
            ,'destroy'
        ]);

        Route::resource('/trackorder',\App\Http\Controllers\admin\OrderTruckController::class)->only([
            'store'
        ]);

        Route::resource('/reviews',\App\Http\Controllers\admin\CommentController::class)->only([
            'index','update','destroy','store'
        ]);

        Route::post('/reviewsapprove',[\App\Http\Controllers\admin\CommentController::class,'approve'])->name('approve.review');
        Route::post('/reply',[\App\Http\Controllers\admin\CommentController::class,'reply'])->name('review.reply');
        Route::patch('/reply/{id}',[\App\Http\Controllers\admin\CommentController::class,'replayUpdate'])->name('review.reply.update');

    });
});






