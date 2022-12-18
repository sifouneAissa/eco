<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class setLocale extends Controller
{
    //

    public function setLocale(Request $request){

        Session::put('locale',$request->input('locale'));

        if(auth()->user())
        auth()->user()->update([
            'lang' => $request->input('locale')
        ]);

    }


    public function setCurrency(Request $request){
        Session::put('currency',$request->input('currency'));

        if(auth()->user())
        auth()->user()->update([
            'currency' => $request->input('currency')
        ]);


    }
}
