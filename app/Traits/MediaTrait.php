<?php

namespace App\Traits;


trait MediaTrait {

    public function mediaProvider(){

        $providers = config('default.media');

        $provider = array_filter($providers,function ($p){
            return $p['builder'] === get_class($this);
        });

        $provider = array_keys($provider);

        if($provider) return array_shift($provider);

        return null;
    }


    public function crumb(){
        return [
            [
                'name' => self::SNAME,
                'route' => route('admin.'.$this->mediaProvider().'.index')
            ],
            [
                'name' => self::INAME.' Media of : ' . $this->name,
                'route' => '#'
            ]
        ];
    }


}
