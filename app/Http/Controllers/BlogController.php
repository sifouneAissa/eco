<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class BlogController extends Controller
{


    public function index(Request $request){

        $blogs = Blog::query()->get();

        $count = Blog::query()->count();

        $query  = $request->input('query');
        return Inertia::render('Blogs',[
            'blogs' => $blogs,
            'query' => $query,
            'count' => $count
        ]);
    }
    public function show($id)
    {
        $blog = Blog::query()->findOrFail($id);

        return Inertia::render('BlogDetail',[
            'blog' => $blog,
        ]);
    }
}
