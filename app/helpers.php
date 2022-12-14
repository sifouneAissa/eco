<?php


if (!function_exists('getLocales')) {

    function isRtl($lang)
    {
        return  in_array($lang,config("app.locales.rtl"));
    }
}
