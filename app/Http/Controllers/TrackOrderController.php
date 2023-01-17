<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderTrackRequest;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TrackOrderController extends Controller
{

    public function show(Request $request,$id){

        $order = null;

        $order = $this->validateOrder();
        if(!$order) abort(404);

        $order->load(['products','paymentDetail','orderTracks','userAddress','orderItems.product']);

        return Inertia::render('TrackOrder',[
            'order' => $order
        ]);

    }

    public function index(){
        return Inertia::render('TrackOrderIndex');
    }

    public function redirectTo(Request $request){


        $order = $this->validateOrder();

        if(!$order) return back()->withErrors('errors.credentials.order_tracking');

        return Inertia::render('TrackOrder',[
            'order' => $order
        ]);

    }

    private function validateOrder(){

        $mobile = request()->input('mobile');
        $id = request()->input("order_id");

        $order = OrderDetail::whereHas('userAddress',function ($builder) use ($mobile){
            $builder->where("mobile",$mobile);
        })->where("id",$id)->with(['products','paymentDetail','orderTracks','userAddress','orderItems.product'])->first();

        return $order;
    }
}
