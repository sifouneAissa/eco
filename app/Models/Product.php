<?php

namespace App\Models;

use App\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use MediaTrait;


    protected $fillable = [
        'name',
        'price',
        'desc',
        'product_category_id',
        'product_inventory_id'
    ];

    protected $appends = [
        'cprice',
        'quantity',
        'modal_ids',
        'fimage'
    ];

    public function getFimageAttribute(){
        $image = env('APP_URL').'/img/checkout.png';

        if($media = $this->media->first())
            $image = $media->getFullUrl();
            return $image;
    }
    public function category(){
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }
    public function inventory(){
        return $this->belongsTo(ProductInventory::class,'product_inventory_id');
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
