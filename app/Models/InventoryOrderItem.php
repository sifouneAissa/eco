<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryOrderItem extends Model
{
    use HasFactory;

    public function inventory(){
        return $this->belongsTo(InventoryOrderItem::class,'inventory_id');
    }

    public function orderItem(){
        return $this->belongsTo(OrderItem::class,'order_item_id');
    }
}
