<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class FaqController extends Controller
{


    public function index(Request $request){

        $blogs = Blog::query()->with(['user'])->get();

        $query  = $request->input('query');
        return Inertia::render('CompanyPages/Faq',[
            'blogs' => $blogs,
            'query' => $query,
        ]);
    }
}
