<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class setLocale extends Controller
{
    //

    public function setLocale(Request $request){

        Session::put('locale',$request->input('locale'));

//        return redirect()->to('/');
    }


    public function setCurrency(Request $request){
        Session::put('currency',$request->input('currency'));
    }
}
