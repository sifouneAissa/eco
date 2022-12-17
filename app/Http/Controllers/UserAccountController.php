<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserAccountController extends Controller
{
    //


    public function index(){
        $addresses = UserAddress::where("user_id",auth()->user()->id)->get();

        return Inertia::render('Account',[
            'addresses' => $addresses
        ]);
    }
}
