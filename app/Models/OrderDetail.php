<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class OrderDetail extends Model
{
    use HasFactory;


    protected $appends = [
        'delivered_date',
        'names',
        'order_number',
        'qnames',
        'price',
        'received',
        'confirmed',
        'picked_up'
    ];

    public function paymentDetail(){
        return $this->hasOne(PaymentDetail::class,'order_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,'order_items','order_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class,'order_id');
    }

    public function orderTracks(){
        return $this->hasMany(OrderTrack::class,'order_id');
    }

    public function userAddress(){
        return $this->belongsTo(UserAddress::class,'address_id');
    }



    public function getDeliveredDateAttribute(){
        $order_tracks = $this->orderTracks->filter(function ($item){
            return $item->status==='delivered';
        });

        if($order_tracks->isNotEmpty()) return translateDate($order_tracks->first()->created_at);

        return null;
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


    public function getQnamesAttribute(){

        $names = "";
        $products = $this->products;

        foreach($products as $product){
            $item = OrderItem::where([
                ['order_id',$this->id],
                ['product_id',$product->id]
            ])->first();


            $names = $item ?   ($product->name." X $item->quantity".' , '.$names)  : $product->name.' , '.$names;
        }

        $names = rtrim($names,' , ');

        return $names;
    }

    public function getOrderNumberAttribute(){
        return '#'.str_pad($this->id, 8, "0", STR_PAD_LEFT);
    }

    public function getPriceAttribute(){

        $tExchange = Currency::where('code',Session::get('currency'))->first()->exchange_rate;
        $value = 0;

        try {
            $value= floor($this->total/$tExchange);
        } catch (\Exception $e){};

        return $value;
    }

    public function getConfirmedAttribute(){
        return $this->orderTracks->where("status","onway")->first();
    }

    public function getReceivedAttribute(){
        return $this->orderTracks->where("status","instore")->first();
    }

    public function getPickedUpAttribute(){
        return $this->orderTracks->where("status","delivered")->first();
    }

}
