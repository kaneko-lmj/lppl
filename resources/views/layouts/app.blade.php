<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-suara.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex min-h-screen">
        
        
        @include('layouts.sidebar')
        
        
        <main class="flex-1 p-4">
            @yield('content')
        </main>

    </div>
    @stack('scripts')
</body>

</html>
