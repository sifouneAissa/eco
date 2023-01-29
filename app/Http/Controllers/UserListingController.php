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
            'count' => $count
        ]);
    }

}
