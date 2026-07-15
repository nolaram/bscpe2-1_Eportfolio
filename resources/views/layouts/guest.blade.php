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


<body class="font-sans antialiased bg-gray-100">


<div class="min-h-screen">


    {{-- Header --}}
    <div class="bg-primary text-white py-10 px-6">

    <div class="text-center">

        <img
            src="{{ asset('images/pup_logo.webp') }}"
            alt="PUP Logo"
            class="w-24 h-24 mx-auto mb-4"
        >

        <h1 class="text-3xl font-bold">
            OJT E-Portfolio
        </h1>

        <p class="text-sm text-gray-200 mt-2">
            OJT Portal
        </p>

    </div>

</div>



    {{-- Login Card --}}
    <div class="flex justify-center px-6 -mt-8">

        <div
            class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-gray-100 px-8 py-10"
        >

            {{ $slot }}

        </div>

    </div>



    {{-- Footer --}}
    <p class="text-center text-sm text-gray-400 mt-12">

        © {{ date('Y') }} Polytechnic University of the Philippines

    </p>


</div>


</body>

</html>