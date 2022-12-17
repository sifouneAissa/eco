<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserAccountController extends Controller
{
    //


    public function index(){
        $auth = auth()->user();
        // addresses of the user
        $addresses = UserAddress::where("user_id",$auth->id)->get();
        // get only paid orders
        $orders = OrderDetail::where("user_id",$auth->id)->whereHas('paymentDetail',function ($builder) {
                $builder->where('status','paid');
        })->with(['paymentDetail','products','orderTracks','userAddress'])->get();

        return Inertia::render('Account',[
            'addresses' => $addresses,
            'orders' => $orders
        ]);
    }
}
