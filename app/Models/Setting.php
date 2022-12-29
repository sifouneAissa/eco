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

    protected $fillable = [
        'name',
        'code',
        'content',
    ];

    protected $appends = [
        'modal_ids'
    ];

    public  function getModalIdsAttribute(){
        return [
            'edit' => 'edit-setting',
            'delete' => 'delete-setting',
            'add' => 'add-setting',
            'show' => 'show-setting'
        ];
    }

}
