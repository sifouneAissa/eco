<!DOCTYPE html>
<html class="no-js" lang="zxx">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="robots" content="noindex, follow" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
{{--        <script src="/assets/ltr/js/plugins.js" type="javascript"></script>--}}
{{--        <script src="/assets/ltr/js/main.js" type="javascript"></script>--}}
        <!-- Scripts -->

        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @if(isRtl(app()->getLocale()))
            @vite(['resources/js/rtl.js'])
        @else
            @vite(['resources/js/ltr.js'])
        @endif

        @if(in_array($page['component'],["Profile/Show"]))
            @vite(['resources/css/app.css'])
        @endif
        @inertiaHead
    </head>
    <body >
        @inertia
    </body>
</html>
