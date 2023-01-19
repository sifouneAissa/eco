<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopping_session_id',
        'product_id',
        'quantity'
    ];

    protected $appends = [
        'qprice',
        'oprice'
    ];


    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function getQpriceAttribute(){
        return $this->product->cprice * $this->quantity;
    }

    public function getPriceAttribute(){
        return $this->product->dprice * $this->quantity;
    }

    public function getOpriceAttribute(){

        return $this->product->price * $this->quantity;
    }

}
