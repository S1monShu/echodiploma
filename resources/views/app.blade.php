<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }}</title>
        {{--    ICON     --}}
        <link rel="icon" href="{{ asset('/favicon.ico') }}">
        @vite('resources/css/slider.css')
        @vite('resources/css/app.css')
        @vite('resources/css/icon-fonts.css')
        @vite('resources/css/fonts.css')
        @vite('resources/css/scrollbar.css')
        @vite('resources/css/range-input.css')
    </head>
    <body>
    <div id="app"></div>
    @vite('resources/js/app.js')
    @vite('resources/js/scripts/slider.js')
    @vite('resources/js/scripts/range-input.js')
    </body>
</html>
