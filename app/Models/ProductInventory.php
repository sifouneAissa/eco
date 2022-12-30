<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
    use HasFactory;


    public function orderItems(){
        return $this->belongsToMany(OrderItem::class,'inventory_order_items','inventory_id');
    }

    public function products(){
        return $this->hasMany(Product::class,'product_inventory_id');
    }

    public function isAvailable($product){

        $data = InventoryOrderItem::where([
            ['inventory_id',$this->id],

        ])->whereHas('orderItem',function ($b) use ($product){
                $b->where("product_id",$product);
        })->get();

        $q = 0;

        $data->map(function ($item) use (&$q){
                $q = $item->orderItem->quantity + $q;
        });

        return [
            'isA' => $this->quantity > $q,
            'remain' => ($this->quantity - $q)>0 ? $this->quantity - $q : 0
        ];
    }

}
