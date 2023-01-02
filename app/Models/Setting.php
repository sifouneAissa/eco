<?php

namespace App\Models;

use App\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use HasFactory;

    use InteractsWithMedia;
    use MediaTrait;


    public const SNAME = 'Settings';
    public const INAME = 'Setting';


    protected $fillable = [
        'name',
        'code',
        'content',
    ];

    protected $appends = [
        'modal_ids',
        'fimage'
    ];

    public function getFimageAttribute(){
        $img = '/img/logo.png';

        if($f = $this->media?->first()?->getFullUrl())
             return $f;

        return $img;
    }


    public  function getModalIdsAttribute(){
        return [
            'edit' => 'edit-setting',
            'delete' => 'delete-setting',
            'add' => 'add-setting',
            'show' => 'show-setting'
        ];
    }

}
