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
        'fimage',
        'address',
        'phone',
        'email',
        'company_name',
    ];

    public function getFimageAttribute(){
        $img = '/img/logo.png';

        if($f = $this->media?->first()?->getFullUrl())
             return $f;

        return $img;
    }
    public function getAddressAttribute(){

        if($this->code==='address')
             return $this->content;
    }
    public function getPhoneAttribute(){

        if($this->code==='phone')
             return $this->content;
    }
    public function getEmailAttribute(){

        if($this->code==='email')
             return $this->content;
    }
    public function getCompanyNameAttribute(){

        if($this->code==='company_name')
             return $this->content;
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
