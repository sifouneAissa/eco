<?php

namespace App\Models;

use App\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductCategory extends Model implements HasMedia
{
    use HasFactory;
    use MediaTrait;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'desc',
        'show_in_dash'
    ];
    protected $appends = [
        'count',
         'fimage',
        'modal_ids',
    ];

    protected $casts = [
        'show_in_dash' => 'boolean'
    ];


    public const SNAME = 'Product categories';
    public const INAME = 'Product category';

    public function products(){
        return $this->hasMany(Product::class,'product_category_id');
    }

    public function getCountAttribute(){
        return $this->products->count();
    }

    public function getFimageAttribute(){
        $img = '/img/categories.png';

        if($f = $this->media()->orderBy('order')?->first()?->getFullUrl())
             return $f;

        return $img;
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
