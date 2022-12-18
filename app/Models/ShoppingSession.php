<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class ShoppingSession extends Model
{
    use HasFactory;

    protected $casts = [
        'total' =>  'double'
    ];

    protected $appends = [
        'names',
        'price',
        'tprice'
    ];

    public function products(){
        return $this->belongsToMany(Product::class,'cart_items');
    }

    public function cartItems(){
        return $this->hasMany(CartItem::class,'shopping_session_id');
    }


    public function getNamesAttribute(){
        $names = "";
        $products = $this->products;

        foreach($products as $product){
            $names =  $product->name.' , '.$names;
        }

        $names = rtrim($names,' , ');

        return $names;
    }


    public function getPriceAttribute(){

        $tExchange = Currency::where('code',Session::get('currency'))->first()->exchange_rate;
        $value = 0;

        try {
            $value= floor($this->total / $tExchange);
        } catch (\Exception $e){

        };

        return $value;
    }


    public function getTPriceAttribute(){

        $tExchange = Currency::where('code',Session::get('currency'))->first()->exchange_rate;

        $value = 0;
        $total = 0;

        $products = $this->products;

        foreach ($products as $product){
                $total = $product->price +  $total;
        }

        try {
            $value= floor($total / $tExchange);
        } catch (\Exception $e){};


        return $value;
    }



}
