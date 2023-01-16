<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartItemController extends Controller
{
    //

    public function update(Request $request,$id){
        CartItem::find($id)->update(filterRequest($request->all(),CartItem::class));
    }

    public function destroy($id){
        CartItem::find($id)?->delete();
    }

    public function index(Request $request){
        return Inertia::render('Cart');
    }

}
