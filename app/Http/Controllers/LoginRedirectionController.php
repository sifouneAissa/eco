<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginRedirectionController extends Controller
{
    //

    public function redirect(){
        dd("check");
        return auth()->user()->is_admin ? redirect()->route('admin.index') : redirect()->route('welcome');
    }
}
