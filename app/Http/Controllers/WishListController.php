<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WishListController extends Controller
{
    //


    public function index(){

        $models = Wishlist::where('user_id',auth()->user()->id)->with(['user','product.category'])->orderBy('created_at','desc')->get();

        return Inertia::render('WishList',[
            'models' => $models
        ]);
    }

    public function store(Request $request){

        Wishlist::create(array_merge(
            filterRequest($request->all(),Wishlist::class),
            [
               'user_id' => auth()->user()->id
            ]
        ));
    }

    public function destroy($id){
        Wishlist::find($id)?->delete();
    }
}
