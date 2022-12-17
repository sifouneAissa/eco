<?php


use Illuminate\Support\Carbon;

if (!function_exists('getLocales')) {

    function isRtl($lang)
    {
        return  in_array($lang,config("app.locales.rtl"));
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

