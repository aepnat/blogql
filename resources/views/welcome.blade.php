<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BlogQL</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
    <script src="{{ mix('js/app.js') }}" type="text/javascript" defer></script>

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>
<body>
<div id="app">
    <router-view></router-view>
</div>
</body>
</html>
