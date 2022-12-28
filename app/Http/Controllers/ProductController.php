<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

        $product = Product::query()->findOrFail($id)->load(['category']);
        if(!$product->isA()['isA'])  abort(404);

        $callbackIsA = function ($item){
            return $item->isA()['isA'];
        };
        $callback = function ($item){
            $item['isA'] = $item->isA();
            $item['quantity'] = 1;
            return $item;
        };

        $bestSellers = Product::query()->whereNot('id',$id)->get()->filter($callbackIsA)->sort(function ($item){
            return $item->buyersCount();
        })->take(3)->map($callback);

        $sameCategory = Product::query()->where('product_category_id',$product->product_category_id)->get()->filter($callbackIsA)->map($callback);


        $product['media'] = $product->media->map(function ($item){
            $item['url'] = $item->getFullUrl();
            return $item;
        });

        $bestSellers->map($callback);

        $product['isA'] = $product->isA();
        $product['quantity'] = 1;

        return Inertia::render('ProductDetail',[
            'product' => $product,
            'bestSellers' => $bestSellers,
            'sameCategory' => $sameCategory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
