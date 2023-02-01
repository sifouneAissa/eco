<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserListingController extends Controller
{
    //

    public function index(Request $request){


        $seo = gSeo('Himpies Products Page','Himpies is a hemp brand powered by SESHATA. Based in United Arab Emirates.We bring the best quality of HEMP products over the world to you.');


        $filerCallback = function ($product){
            $isA = $product->isA();
            $product['isA'] = $isA;
            $product['category'] = $product->category;
            return $isA['isA'];
        };

        $products = searchInModel($request,Product::class,$filerCallback);

        $count = Product::query()->count();

        $categories = ProductCategory::get();

        $query  = $request->input('query');

        $query = ProductCategory::where('name',$query)->count() ? $query : null;


        return Inertia::render('Listing',[
            'products' => $products,
            'categories' => $categories,
            'query' => $query,
            'count' => $count,
            'seo' => $seo
        ]);
    }

}
