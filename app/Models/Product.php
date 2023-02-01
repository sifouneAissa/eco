<?php

namespace App\Models;

use App\Modules\TransLogic\Traits\ModelTranslationsModel;
use App\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Session;
use Laravel\Scout\Searchable;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use MediaTrait;
    use Searchable;
    use ModelTranslationsModel;

    public const SNAME = 'Products';
    public const INAME = 'Product';

    protected $fillable = ['name','price','old_price','desc','product_category_id','product_inventory_id'];
    protected $appends = ['cprice','quantity','modal_ids','fimage','isA','dprice' , 'coprice','name_ar','name_fr',
        'surl',
        'desc_ar',
        'desc_fr',
        'lname',
        'ldesc',
        'nameseo'
//        'new','bests','popular'
    ];


    public function category(){
        return $this->belongsTo(ProductCategory::class,'product_category_id');
    }

    public function cartItems(){
        return $this->hasMany(CartItem::class);
    }

    public function inventory(){
        return $this->belongsTo(ProductInventory::class,'product_inventory_id');
    }

    public function isA(){
        return $this->inventory->isAvailable($this->id);
    }

    public  function getModalIdsAttribute(){
        return [ 'edit' => 'edit-product', 'delete' => 'delete-product','add' => 'add-product','show' => 'show-product'];
    }

    public function toSearchableArray()
    {
        $array = getSearchable($this,[
        ],[
            'created_at'
        ]);

        $array['category'] = $this->category->name;
        return $array;
    }

    public function getIsAAttribute(){
        return $this->isA();
    }

    public function getNewAttribute(){
        return $this->orderItems->count() > 0;
    }
//    public function getPopularAttribute(){
//        return populars()->where('id',$this->id) !== null;
//    }
//    public function getBestsAttribute(){
//        return BestSellers()->where('id',$this->id) !== null;
//    }


    public function getCpriceAttribute(){

        $tExchange = Currency::where('code',Session::get('currency'))->first()->exchange_rate;
        $value = 0;

        try {
            $value= floor($this->price/$tExchange);
        } catch (\Exception $e){};

        return $value;
    }

    public function getCopriceAttribute(){

        $tExchange = Currency::where('code',Session::get('currency'))->first()->exchange_rate;
        $value = 0;

        try {
            $value= floor($this->old_price/$tExchange);
        } catch (\Exception $e){};

        return $value;
    }
    public function getFimageAttribute(){
        $image = env('APP_URL').'/img/checkout.png';

        if($media = $this->media()->orderBy('order')->first())
            $image = $media->getFullUrl();
        return $image;
    }
    public function getQuantityAttribute(){
        return 1;
    }
    public function buyersCount(){

        $items = $this->orderItems;
        $q = 0;
        foreach($items as $item) $q = $q+$item->quantity;
        return $q;
    }

    public function cartCount(){

        $items = $this->cartItems;
        $q = 0;
        foreach($items as $item) $q = $q+$item->quantity;
        return $q;
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class,'product_id');
    }


    public function getDpriceAttribute(){
        $tExchange = Currency::where('code','dollar')->first()->exchange_rate;
        $value = 0;
        try {
            $value= floor($this->price/$tExchange);
        } catch (\Exception $e){};

        return $value;
    }


    public function getDescFrAttribute(){
        $values = $this->fr_translations()->where('key','desc')->get();
        if($values->count()) return $values->first()->only('value','id');

        return null;
    }

    public function getDescArAttribute(){
        $values = $this->ar_translations()->where('key','desc')->get();
        if($values->count()) return $values->first()->only('value','id');

        return null;
    }

    public function getLnameAttribute(){
        return $this->checkAndGetAttr('name');
    }


    public function getLdescAttribute(){
        return $this->checkAndGetAttr('desc');
    }

    public function getNameseoAttribute(){
        return str_replace(' ','-',$this->name);
    }

    public function getSurlAttribute(){
        return route('product.show',[
            'id' => $this->nameseo
        ]);
    }


    public function GSEO(){
        return gSeo(
            $this->nameseo,
            strip_tags($this->desc),
            $this->fimage
        );
    }

}
