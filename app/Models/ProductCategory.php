<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $appends = [
        'count',
        'fimage'
    ];

    public function products(){
        return $this->hasMany(Product::class,'product_category_id');
    }

    public function getCountAttribute(){
        return $this->products->count();
    }

    public function getFimageAttribute(){
        return $this->products->first()->fimage;
    }
}
