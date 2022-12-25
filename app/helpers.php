<?php


use Illuminate\Support\Carbon;

if (!function_exists('getLocales')) {

    function isRtl($lang)
    {
        return  in_array($lang,config("app.locales.rtl"));
    }
}

if (!function_exists('filterRequest')) {


     function filterRequest($inputs,$model){

        $fillable = app($model)->getFillable();

        return array_filter($inputs,function ($item) use ($fillable,$inputs){
            return in_array($item,$fillable) && $inputs[$item] ;
        },ARRAY_FILTER_USE_KEY);
    }
}

if (!function_exists('mediaPermissions')) {

    function mediaPermissions($modelBuilder,$provider=null)
    {
        $actions = [
            'edit',
            'add',
            'delete',
            'view'
        ];

        if(!$provider)
        $provider = app($modelBuilder)->mediaProvider();

        foreach($actions as $action){
            $to_return[] = $action." ".$provider." media";
        }

        return $to_return;
    }
}


if(!function_exists('translateDate')) {

    function translateDate($date, $getO = false)
    {
        try {
            if ($date && !str_contains($date, '/')) {
                if (!$getO)
                    $date = Carbon::parse($date)->isoFormat('LLLL');
                else
                    $date = Carbon::parse($date)->toDateString();
            } else if (str_contains($date, '/')) {
                if (!$getO)
                    $date = Carbon::createFromFormat('d/m/Y', $date)->isoFormat('LLLL');
                else
                    $date = Carbon::createFromFormat('d/m/Y', $date)->toDateString();
            }

        } catch (\Exception $e) {
        }
        return $date;
    }
}

