<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LogWise | Log your app in realtime</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap">

        <!-- Tailwind -->
        <script src="https://cdn.tailwindcss.com"></script>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="antialiased">
        <div class="main-container">
            @include('console')
        </div>
    </body>
</html>
