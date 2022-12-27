<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class NotificationController extends Controller
{
    //

    public function readAll(){
        auth()->user()->unreadNotifications()->update(['read_at' => now()]);
    }
}
