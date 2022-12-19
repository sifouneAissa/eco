<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserListingController extends Controller
{
    //

    public function index(){

        $products  = Product::get();

        return Inertia::render('Listing',[
            'products' => $products
        ]);
    }
//
//    public function products(){
//        $products  = Product::get();
//    }
}
