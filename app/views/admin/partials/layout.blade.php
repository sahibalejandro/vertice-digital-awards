<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Backstage - Vértice Digital Awards</title>
    <link rel="stylesheet" href="/css/site.min.css"/>
</head>
<body>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">Backstage</a>
        </div>
    </nav>

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>

    <script src="/js/site.min.js"></script>
</body>
</html>
