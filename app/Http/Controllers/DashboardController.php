<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;

class DashboardController extends Controller
{
    //

    public function index(){

        $categories = ProductCategory::get();
        $blogs = Blog::get();
        $bestSellers = BestSellers();
        $nproducts = Product::query()->with('category')->whereDoesntHave('orderItems')->get();
        $populars = populars();

        $dCat = ProductCategory::where("show_in_dash",true)->first();
        if($dCat)
        $dCat['products'] = $dCat?->products->load("category")->take(3);

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'categories' => $categories,
            'blogs' => $blogs,
            'bestSellers' => $bestSellers,
            'nproducts' => $nproducts,
            'populars' => $populars,
            'dcat' => $dCat
        ]);
    }
}
