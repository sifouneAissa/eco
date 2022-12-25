<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderTrack;
use Illuminate\Http\Request;

class OrderTruckController extends Controller
{
    //

    public function store(Request $request){

        if($request->input('status') === "instore")
        OrderTrack::whereIn('status',[
           'onway','delivered','instore'
        ])->where('order_id',$request->input('order_id'))->get()->map(fn ($item) => $item->delete());
        else if($request->input('status') === "onway")
            OrderTrack::whereIn('status',[
                'onway','delivered'
            ])->where('order_id',$request->input('order_id'))->get()->map(fn ($item) => $item->delete());
        else if($request->input('status') === "delivered")
            OrderTrack::whereIn('status',[
                'delivered'
            ])->where('order_id',$request->input('order_id'))->get()->map(fn ($item) => $item->delete());

        $inputs = filterRequest($request->all(),OrderTrack::class);

        OrderTrack::create($inputs);

    }
}
