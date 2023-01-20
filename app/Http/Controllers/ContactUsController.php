<?php

namespace App\Http\Controllers;

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
        UserMessage::query()->create(filterRequest($request->all(),UserMessage::class));
    }
}
