<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Desenvolvimento de sistemas web personalizados, sites e landing pages para impulsionar o seu negócio. Conte com nossa expertise em consultoria em BI para obter insights poderosos. Soluções tecnológicas sob medida para atender às necessidades únicas do seu negócio. Transforme sua visão em realidade com a nossa equipe qualificada e as mais modernas tecnologias." />

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
