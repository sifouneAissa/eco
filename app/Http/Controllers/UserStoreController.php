<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserStoreController extends Controller
{
    //

    public function index(){

        $auth = auth()->user();


        return Inertia::render('Store');
    }
}
