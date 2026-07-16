<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100 font-sans antialiased">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside
        class="w-64 bg-white border-r border-gray-200">

        <div class="h-16 flex items-center px-6 border-b">

            <h1 class="text-xl font-bold text-primary">

                OJT E-Portfolio

            </h1>

        </div>

        <nav class="p-4 space-y-2">

            {{ $sidebar }}

        </nav>

    </aside>

    {{-- Main --}}
    <div class="flex-1 flex flex-col">

        {{-- Topbar --}}
        <header
            class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8">

            <h2
                class="text-lg font-semibold text-gray-800">

                {{ $title }}

            </h2>

            <div
                class="text-sm text-gray-500">

                {{ Auth::user()->first_name ?? Auth::user()->name }}

            </div>

        </header>

        {{-- Content --}}
        <main
            class="flex-1 p-8">

            {{ $slot }}

        </main>

    </div>

</div>

</body>

</html>