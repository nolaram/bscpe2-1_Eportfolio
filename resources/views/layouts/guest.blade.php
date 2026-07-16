<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OJT E-Portfolio') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="font-sans antialiased bg-gray-50">


<div class="min-h-screen flex flex-col">


    {{-- Header --}}
    <header class="bg-primary text-white py-10">

        <div class="text-center">

            <img
                src="{{ asset('images/pup_logo.webp') }}"
                alt="PUP Logo"
                class="w-24 h-24 mx-auto mb-4"
            >


            <h1 class="text-3xl font-bold">
                OJT E-Portfolio
            </h1>


            <p class="mt-2 text-gray-200">
                Student Portal
            </p>


            <p class="mt-4 text-sm text-gray-300">
                Polytechnic University of the Philippines
            </p>

        </div>

    </header>



    {{-- Login Area --}}
    <main class="flex-1 flex justify-center px-6 -mt-6">


        <div
            class="w-full max-w-md bg-white rounded-xl shadow-lg border border-gray-200 p-8 h-fit"
        >

            {{ $slot }}

        </div>


    </main>


    {{-- Footer --}}
    <footer class="text-center py-6 text-sm text-gray-400">

        © {{ date('Y') }} Polytechnic University of the Philippines

    </footer>


</div>


</body>

</html>