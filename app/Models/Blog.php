<?php

namespace App\Models;

use App\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use HasFactory;

    use InteractsWithMedia;
    use MediaTrait;

    public  $provider = 'blog';


    public const SNAME = 'Blogs';
    public const INAME = 'Blog';

    protected $appends = [
        'modal_ids',
        'fimage',
        'created',
    ];
    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function getCreatedAttribute(){
       
        return translateDate($this->created_at);
    }
    public function getFimageAttribute(){
        $img = '/img/categories.png';

        if($f = $this->media?->first()?->getFullUrl())
             return $f;

        return $img;
    }

    protected $fillable = [
        'title',
        'blog',
        'description',
        'created_by',
    ];
    public  function getModalIdsAttribute(){
        return [
            'edit' => 'admin.blog.edit',
            'delete' => 'delete-blog',
            'add' => 'admin.blog.create',
            'show' => 'admin.blog.show'
        ];
    }
}
