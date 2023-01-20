<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\UserMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserMessageController extends Controller
{
    //

    public function index(){
        $messages = UserMessage::query()->orderBy('created_at','desc')->get();

        return Inertia::render('Messages',[
            'messages'=> $messages
        ]);
    }


    public function destroy($id){
        UserMessage::find($id)?->delete();
    }

    public function readAt($id){
        $message = UserMessage::find($id);
        $message->read_at = Carbon::now();
        $message->save();
    }
}
