<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserListingController extends Controller
{
    //

    public function index(){

        $products  = Product::get()->filter(function ($product){
                $isA = $product->isA();
                $product['isA'] = $isA;

                return $isA['isA'];
        });


        return Inertia::render('Listing',[
            'products' => $products
        ]);
    }

}
