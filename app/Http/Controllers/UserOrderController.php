<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\ShoppingSession;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    //


    public function addProduct(Request $request){

        // format
        //        item = [
        //            'quantity' => '',
        //            'product_id' => ''
        //        ]
        $item = $request->all();
        $s_session = auth()->user()->shopping_session;

            if(!$s_session){
                $s_session = ShoppingSession::create([
                        'total' => 0,
                         'user_id' => auth()->user()->id
                ]);
            }


            // add item
            CartItem::create([
                'quantity' => isset($item['quantity']) ? $item['quantity'] : 1,
                'product_id' => $item['product_id'],
                'shopping_session_id' => $s_session->id
            ]);
    }
}
