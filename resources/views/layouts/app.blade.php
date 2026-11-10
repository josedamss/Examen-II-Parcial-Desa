<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>
    @vite('resources/js/ui.js')
</head>
<body>
    <main class="container py-4">
        @yield('content')
    </main>
    @stack('modals')
</body>
</html>
