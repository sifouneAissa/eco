<?php


namespace App\Traits;

trait OrdersTrait {

    public function ordersBtn(){
        return [
            'route' => route('admin.order.index',[
                config('default.orders.'.$this->ordersProvider().'.key') => $this[config('default.orders.'.$this->ordersProvider().'.origin_key')]
            ])
        ];
    }


    public function ordersProvider(){

        $providers = config('default.orders');

        $provider = array_filter($providers,function ($p){
            return $p['builder'] === get_class($this);
        });

        $provider = array_keys($provider);

        if($provider) return array_shift($provider);

        return null;
    }
}
