<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginRedirectionController extends Controller
{
    //

    public function redirect(){
        return auth()->user()->is_admin ? redirect()->route('admin.index') : redirect()->route('welcome');
    }
}
