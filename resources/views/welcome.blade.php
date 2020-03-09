<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="font-sans text-black antialiased">
      <h1>{{$title}}</h1>
      <div id="app" class="h-screen w-full flex justify-center items-center">
        <comment-form class ="w-1/2"/>
      </div>
      <script src="/js/app.js"></script>
    </body>
</html>
