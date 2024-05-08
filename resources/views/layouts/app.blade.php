<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist
/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/
js/bootstrap.bundle.min.js"></script>

    <title>@yield('title')</title>
</head>

<body class="container">
    <div class="container border p-4 bg-primary text-white">
        @section('header')
        <h3>Berkenalan Dengan Laravel Blade</h3>
        @show
    </div>
    <div class="container px-4 py-2">
        @yield('content')
    </div>
    <div class="container border p-2 bg-dark text-white

text-center">

        @include('layouts.footer')
    </div>
</body>

</html>