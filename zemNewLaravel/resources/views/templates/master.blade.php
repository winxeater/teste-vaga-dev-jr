<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dash</title>
    <link rel="stylesheet" href="{{asset('css/stylesheet.css')}}"> 
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">

    
   
</head>
<body>
    @include('templates.menu')
    @include('templates.table')
    @yield('conteudo-view')
    @yield('js-view')

    {{-- <script src="{{asset('js/javascript.js')}}"></script> --}}
</body>
</html>
