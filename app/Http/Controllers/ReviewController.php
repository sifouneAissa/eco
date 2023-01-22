<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function store(Request $request){


        $inputs = filterRequest($request->all(),Comment::class);
        if(auth()->user())
        {
            $inputs['commenter_id'] = auth()->user()->id;
            $inputs['commenter_type'] = User::class;
        }

        Comment::query()->create($inputs);
    }
}
