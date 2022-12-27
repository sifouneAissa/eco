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

        $products = searchInModel($request,Product::class,function ($product){
            $isA = $product->isA();
            $product['isA'] = $isA;
            return $isA['isA'];
        });

        $count = Product::query()->count();


        $categories = ProductCategory::get();

        $query  = $request->input('query');
        return Inertia::render('Listing',[
            'products' => $products,
            'categories' => $categories,
            'query' => $query,
            'count' => $count
        ]);
    }

}
