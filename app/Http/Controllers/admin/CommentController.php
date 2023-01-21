<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommentController extends Controller
{
    //
    public function index(){
        $comments = Comment::query()->with(['commentable','commenter'])->orderBy('created_at','desc')->paginate(6)->through(function ($item) {
            return $item->toArray();
        });

        $types = [
            [
                'name' => 'Blog',
                'values' => Blog::query()->get(['id','title'])->map(function ($item){
                    return [
                        'name' => $item->title,
                        'id' => $item->id,
                        'cclass' => $item->cclass
                    ];
                }),
            ],
            [
                'name' => 'Product',
                'values' => Product::query()->get(['id','name'])->map(function ($item){
                    return [
                        'name' => $item->name,
                        'id' => $item->id,
                        'cclass' => get_class($item)
                    ];
                }),
            ]
        ];


        return Inertia::render('Reviews',[
            'comments' => $comments,
            'types' => $types
        ]);
    }

    public function update(ReviewRequest $request,$id){
        $comment = Comment::query()->find($id);
        $comment->update(filterRequest($request->all(),Comment::class));
    }

    public function approve(Request $request){
        $comment = Comment::query()->find($request->review_id);
        $comment->update(filterRequest($request->all(),Comment::class));

    }

    public function destroy($id){
        Comment::query()->find($id)->delete();
    }

    public function store(ReviewRequest $request){
        Comment::query()->create(array_merge(
            filterRequest($request->all(),Comment::class),
            [
                'commenter_id' => auth()->user()->id,
                'commenter_type' => User::class
            ]
        ));
    }

}
