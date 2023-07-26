<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Belmira Tech</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@latest/css/materialdesignicons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">


        @vite('resources/css/app.css')
    </head>
    <body >
        <div id="app"></div>
        @vite('resources/js/app.js')
    </body>
</html>
