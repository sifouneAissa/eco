<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //


    public function index(){

        // can view dashboard using spatie
        $this->middleware('can:view dashboard');

        return Inertia::render('Dashboard');
    }

}
