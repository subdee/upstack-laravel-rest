<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sports</title>

        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
        <div id="app">
            <app-component></app-component>
        </div>
        <script src="js/app.js"></script>
    </body>
</html>
