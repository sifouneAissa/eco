<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\OrderTrack;
use App\Notifications\UpdateOrder;
use Illuminate\Http\Request;

class OrderTruckController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware(['permission:update order status'])->only(['store']);
    }

    public function store(Request $request){
        $el = null;
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

        $el = OrderTrack::create($inputs);
        $user = OrderDetail::find($request->input('order_id'))->user;

        // lunch the event
        event(new \App\Events\UpdateOrder($user,$el));

    }
}
