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
        'qprice'
    ];


    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }

    public function getQpriceAttribute(){
        return $this->product->cprice * $this->quantity;
    }
}
