<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vértice Digital Awards 2014</title>
    <link rel="stylesheet" href="/css/site.min.css"/>
</head>
<body>

    @include('partials.navbar')

    @yield('header')

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>

    <script src="/js/site.min.js"></script>
</body>
</html>
