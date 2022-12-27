<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\ShoppingSession;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{


    public function addProduct(Request $request){
        // format
        //        item = [
        //            'quantity' => '',
        //            'product_id' => ''
        //        ]
        $item = $request->all();

        $is_auth = auth()->user();
        if($is_auth)
        $s_session = auth()->user()->shopping_session;
        else
        $s_session = ShoppingSession::where('ip',$request->ip())->first();

        if(!$s_session){
                $data = [
                    'total' => 0,
                    'user_id' => $is_auth ? auth()->user()->id : 0
                ];

                if(!$is_auth) {
                    $data ['type'] = 'guest';
                    $data['ip'] = $request->ip();
                }

                $s_session = ShoppingSession::create($data);
            }

            // add item
            CartItem::create([
                'quantity' => isset($item['quantity']) ? $item['quantity'] : 1,
                'product_id' => $item['product_id'],
                'shopping_session_id' => $s_session->id
            ]);
    }
}
