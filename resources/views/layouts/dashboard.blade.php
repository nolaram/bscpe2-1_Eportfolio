<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'BSCpE 2-1 OJT E-Portfolio')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    @include('components.navbar')

    <div class="flex">

        @include('components.sidebar')

        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>

</body>
</html>