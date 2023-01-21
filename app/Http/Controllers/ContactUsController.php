<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Events\NewOrder;
use App\Http\Requests\UserMessageRequest;
use App\Models\UserMessage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //

    public function index(){

        return \inertia("CompanyPages/ContactUs");
    }

    public function store(UserMessageRequest $request){
        $message = UserMessage::query()->create(filterRequest($request->all(),UserMessage::class));

        try {
            event(new NewMessage($message));
        }catch (\Exception $e){

        }
    }
}
