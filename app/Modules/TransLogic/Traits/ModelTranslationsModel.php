<?php


namespace App\Modules\TransLogic\Traits;

use App\Modules\TransLogic\Models\Translation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

trait ModelTranslationsModel {

    public function translations(){
        return $this->morphMany(Translation::class,'model');
    }

    public function ar_translations(){
        return $this->morphMany(Translation::class,'model')->where('lang','ar');
    }

    public function fr_translations(){
        return $this->morphMany(Translation::class,'model')->where('lang','fr');
    }

    public function addTranslations($data){

        if(is_string($data))
            $data = json_decode($data,true);

        if($data && count($data)) {

            foreach($data as $dlang){
                    if(key_exists('value',$dlang) && $dlang['value']) {
                        $trans = Translation::create([
                            'key' => $dlang['key'],
                            'value' => $dlang['value'],
                            'lang' => $dlang['lang']
                        ]);

                        $this->translations()->save($trans);
                    }
                }

        }

    }

    public function updateTranslations($data)
    {
        if(is_string($data))
            $data = json_decode($data,true);

        if ($data && count($data)) {


                foreach ($data as $dlang) {

                    if(key_exists('id',$dlang)){
                        $trans = Translation::find($dlang['id']);

                        if(key_exists('value',$dlang) && $dlang['value'])
                        $trans->update([
                            'value' => $dlang['value']
                        ]);

                    } else {
                        if(key_exists('value',$dlang) && $dlang['value']) {
                            $trans = Translation::create([
                                'key' => $dlang['key'],
                                'value' => $dlang['value'],
                                'lang' => $dlang['lang']
                            ]);

                            $this->translations()->save($trans);
                        }

                    }


                }


        }
    }
    // public function fr_translations(){
    //     return $this->morphMany(Translation::class,'model')->where('lang','fr');
    // }


    // appends getters
    public function getNameArAttribute(){
        $values = $this->ar_translations()->where('key','name')->get();
        if($values->count()) return $values->first()->only('value','id');

        return null;
    }

    public function getDescriptionArAttribute(){
        $values = $this->ar_translations()->where('key','description')->get();
        if($values->count()) return $values->first()->only('value','id');

        return null;
    }
    public function getNameFrAttribute(){
        $values = $this->fr_translations()->where('key','name')->get();
        if($values->count()) return $values->first()->only('value','id');

        return null;
    }

    public function getDescriptionFrAttribute(){
        $values = $this->fr_translations()->where('key','description')->get();
        if($values->count()) return $values->first()->only('value','id');

        return null;
    }



    public function getNameLangAttribute(){
        return $this->checkAndGetAttr('name');
    }

    public function getDescriptionLangAttribute(){
        return $this->checkAndGetAttr('description');
    }

    public function checkAndGetAttr($name){
        // ar,en,fr
        $locale = Session::get('locale') ? Session::get('locale') : App::getLocale();

        $ename = $this[$name];
        if($locale==="en") return $ename;
        $lname = ($this[$name."_".$locale] ? $this[$name.'_'.$locale]['value'] : null);

        if($lname) return $lname;

        return $ename;
    }
}
