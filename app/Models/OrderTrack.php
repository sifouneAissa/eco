<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTrack extends Model
{
    use HasFactory;


    protected $fillable = [
      'order_id',
      'status',
      'date'
    ];

    public function order(){
        return $this->belongsTo(OrderDetail::class,'order_id');
    }
}
