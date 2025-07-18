<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        @include('includes.style')
        @stack('style')
    </head>
    <body class="bg-[#FDFDFC] text-[#1b1b18]">
        @include('partials.navbar')
        
        <div class="pt-0 dark:bg-gradient-to-br dark:from-gray-900 dark:via-gray-800 dark:to-gray-600 dark:text-white dark:text-white">
            @yield('content')
        </div>
        
        
        @include('partials.footer')
    </body>
    @include('sweetalert::alert')
    @include('includes.script')
    @stack('script')
</html>
