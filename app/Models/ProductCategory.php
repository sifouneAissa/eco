<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'desc',
    ];
    protected $appends = [
        'count',
        'fimage',
        'modal_ids',
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
    public  function getModalIdsAttribute(){
        return [
            'edit' => 'edit-product-category',
            'delete' => 'delete-product-category',
            'add' => 'add-product-category',
            'show' => 'show-product-category'
        ];
    }

}
