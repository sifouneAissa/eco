<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Product extends Model
{
    use HasFactory;

    protected $appends = [
        'cprice',
        'quantity',
        'modal_ids'
    ];


    public function category(){
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }


    public function getCpriceAttribute(){

        $tExchange = Currency::where('code',Session::get('currency'))->first()->exchange_rate;
        $value = 0;

        try {
            $value= floor($this->price/$tExchange);
        } catch (\Exception $e){};

        return $value;
    }


    public function getQuantityAttribute(){
        return 1;
    }


    public  function getModalIdsAttribute(){
        return [
            'edit' => 'edit-product',
            'delete' => 'delete-product',
            'add' => 'add-product',
            'show' => 'show-product'
        ];
    }


}
