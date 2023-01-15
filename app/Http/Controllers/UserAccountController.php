<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserAccountController extends Controller
{
    //


    public function index(Request $request){
        $orders_count = $request->count ? $request->count : 3;
        $auth = auth()->user();
        $paymentMethods = [];
        try{
            $paymentMethods = $auth->paymentMethods();
        }
        catch(\Exception $e){}
        // addresses of the user
        $addresses = UserAddress::where("user_id",$auth->id)->get();
        // get only paid orders
        $orders = OrderDetail::where("user_id",$auth->id)->whereHas('paymentDetail',function ($builder) {
//                $builder->where('status','paid');
        })->with(['paymentDetail','products','orderTracks','userAddress'])->orderBy('created_at','desc')->get()->take($orders_count)->toArray();

        return Inertia::render('Account',[
            'addresses' => $addresses,
            'orders' => $orders,
            'paymentMethods' => $paymentMethods
        ]);
    }
}
