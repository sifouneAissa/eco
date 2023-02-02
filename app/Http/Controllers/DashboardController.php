<?php

namespace App\Http\Controllers;

use App\Events\NewOrder;
use App\Models\Blog;
use App\Models\OrderDetail;
use App\Models\OrderTrack;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Setting;
use App\Models\User;
use App\Notifications\UpdateOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Foundation\Application;



class DashboardController extends Controller
{
    //

    public function index(){


        $seo = gSeo('Himpies','Himpies is a hemp brand powered by SESHATA. Based in United Arab Emirates.We bring the best quality of HEMP products over the world to you.');

        $categories = ProductCategory::get();
        $blogs = Blog::get();
        $bestSellers = BestSellers();
        $nproducts = Product::query()->with('category')->whereDoesntHave('orderItems')->get();
        $populars = populars();

        $dCat = ProductCategory::where("show_in_dash",'section_center')->first();
        $cLeft = ProductCategory::where("show_in_dash",'section_left')->first();
        $cRight = ProductCategory::where("show_in_dash",'section_right')->first();

        $settings = Setting::all();

        if($dCat){
            $products = $dCat?->products->load("category")->take(3);
            $dCat = $dCat->toArray();
            $dCat['products'] = $products;
        }
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
            'dcat' => $dCat,
            'cLeft' => $cLeft,
            'cRight' => $cRight,
             'seo' => $seo
        ]);
    }

}
