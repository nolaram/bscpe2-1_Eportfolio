<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>

        @yield('title', 'OJT E-Portfolio')

    </title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body
    class="bg-background font-sans antialiased overflow-hidden"
    x-data="{ sidebarOpen: true }"
>

    <div class="flex h-screen">

        {{-- Sidebar --}}
        @include('components.sidebar')

        {{-- Main Content --}}
        <div class="flex flex-1 flex-col overflow-hidden">

            {{-- Navbar --}}
            @include('components.navbar')

            {{-- Page --}}
            <main class="flex-1 overflow-y-auto p-6">

                @yield('content')

            </main>

        </div>

    </div>

</body>

</html>