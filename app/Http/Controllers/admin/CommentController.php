<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommentController extends Controller
{
    //
    public function index(){
        $comments = Comment::query()->with(['commentable','commenter'])->get();

        return Inertia::render('Reviews',[
            'comments' => $comments
        ]);
    }

    public function update(Request $request,$id){
        $comment = Comment::query()->find($id);
        $comment->update(filterRequest($request->all(),Comment::class));
    }

    public function destroy($id){
        Comment::query()->find($id)->delete();
    }

}
