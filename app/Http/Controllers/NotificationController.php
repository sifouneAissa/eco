<?php

namespace App\Http\Controllers;

use App\Notifications\NewMessageNotification;
use App\Notifications\NewOrder;
use App\Notifications\UpdateOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class NotificationController extends Controller
{
    //

    public function readAll(){

        auth()->user()->unreadNotifications()->whereIn('type',[
           NewOrder::class,
            UpdateOrder::class
        ])->update(['read_at' => now()]);
    }

    public function readAllMessages(){
        auth()->user()->unreadNotifications()->whereIn('type',[
            NewMessageNotification::class
        ])->update(['read_at' => now()]);;
    }
}
