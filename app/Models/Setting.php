<?php

namespace App\Models;

use App\Modules\TransLogic\Traits\ModelTranslationsModel;
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

    use ModelTranslationsModel;

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
        'facebook',
        'instagram',
        'twitter',
        'youtube',
    ];

    public function getFimageAttribute(){
        $img = '/img/oldlogo-1.png';

        if($f = $this->media()->orderBy('order')?->first()?->getFullUrl())
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
    public function getFacebookAttribute(){

        if($this->code==='facebook_link')
             return $this->content;
    }
    public function getInstagramAttribute(){

        if($this->code==='instagram_link')
             return $this->content;
    }
    public function getTwitterAttribute(){

        if($this->code==='twitter_link')
             return $this->content;
    }
    public function getYoutubeAttribute(){

        if($this->code==='youtube_link')
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


    public function getContentFrAttribute(){
        $values = $this->fr_translations()->where('key','content')->get();
        if($values->count()) return $values->first()->only('value','id');

        return null;
    }

    public function getContentArAttribute(){
        $values = $this->ar_translations()->where('key','content')->get();
        if($values->count()) return $values->first()->only('value','id');

        return null;
    }


    public function getLnameAttribute(){
        return $this->checkAndGetAttr('name');
    }


    public function getLcontentAttribute(){
        return $this->checkAndGetAttr('content');
    }

}
