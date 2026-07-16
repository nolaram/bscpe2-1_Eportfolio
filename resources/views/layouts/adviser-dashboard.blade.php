<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Adviser Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-background overflow-hidden"
    x-data="{ sidebarOpen: true }"
>

<div class="flex h-screen">

    @include('components.adviser-sidebar')

    <div class="flex flex-1 flex-col overflow-hidden">

        @include('components.adviser-navbar')

        <main class="flex-1 overflow-y-auto p-6">

            @yield('content')

        </main>

    </div>

</div>

</body>

</html>