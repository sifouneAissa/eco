<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TrackOrderController extends Controller
{

    public function show($id){
        $order = null;

        try {
            $order = OrderDetail::where('id',$id)->with(['products','paymentDetail','orderTracks','userAddress','orderItems.product'])->first();
        }catch (\Exception $e){
        }

        if(!$order) abort(404);
        

        return Inertia::render('TrackOrder',[
            'order' => $order
        ]);

    }
}
