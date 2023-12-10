<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
{{--        <meta charset="utf-8">--}}
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ config('app.name', 'Laravel') }} Administration</title>

        <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon" />
        <!-- Fonts -->
{{--        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">--}}
        <!-- Scripts -->
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" integrity="sha512-24XP4a9KVoIinPFUbcnjIjAjtS59PUoxQj3GNVpWc86bCqPuy3YxAcxJrxFCxXe4GHtAumCbO2Ze2bddtuxaRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
        @routes
{{--        @vite(['resources/js/app-admin.js', "resources/js/Pages/Admin/{$page['component']}.vue"])--}}
         {{\Illuminate\Support\Facades\Vite::useHotFile('admin.hot')->useBuildDirectory('build-admin')->withEntryPoints(['resources/js/app-admin.js'])}}
        @if(in_array($page['component'],["Profile/Show"]) )
            @vite(['resources/css/app.css'])
        @endif
        @inertiaHead
    </head>
    <body  class="sb-nav-fixed">
        @inertia
    </body>


</html>
