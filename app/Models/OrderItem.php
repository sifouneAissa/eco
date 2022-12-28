<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected  $fillable = [
        'quantity',
        'order_id',
        'product_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function inventoryOrderItems(){
        return $this->belongsToMany(ProductInventory::class,'inventory_id');
    }



}
