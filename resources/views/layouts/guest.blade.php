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


<div class="relative min-h-screen flex flex-col overflow-hidden">

    {{-- Decorative drifting background blobs, same visual language as the dashboards --}}
    <div class="pointer-events-none absolute -left-32 -top-32 h-96 w-96 rounded-full bg-primary/10 blur-3xl animate-blob-drift"></div>
    <div class="pointer-events-none absolute -right-32 top-1/3 h-96 w-96 rounded-full bg-accent/20 blur-3xl animate-blob-drift-slow"></div>
    <div class="pointer-events-none absolute bottom-0 left-1/3 h-80 w-80 rounded-full bg-primary/10 blur-3xl animate-blob-drift"></div>

    {{-- Header --}}
    <header
        data-auth-header
        class="relative bg-primary text-white py-10 overflow-hidden"
    >

        {{-- Floating "constellation" star field (see star-field.js) --}}
        <canvas
            data-star-field
            class="pointer-events-none absolute inset-0 h-full w-full"
        ></canvas>

        <div class="relative text-center">

            <div class="relative mx-auto mb-4 h-24 w-24">

                {{-- Soft pulsing gold glow behind the logo — sized larger
                     than the logo itself so the glow actually spills out
                     around the edges instead of hiding behind it --}}
                <div class="pointer-events-none absolute -inset-6 -z-10 rounded-full header-logo-glow"></div>

                <img
                    data-auth-logo
                    src="{{ asset('images/pup_logo.webp') }}"
                    alt="PUP Logo"
                    class="h-24 w-24"
                >

            </div>


            <h1
                data-auth-heading
                class="text-3xl font-bold"
            >
                OJT E-Portfolio
            </h1>


            <p
                data-auth-heading
                class="mt-2 text-gray-200"
            >
                Student Portal
            </p>


            <p
                data-auth-heading
                class="mt-4 text-sm text-gray-300"
            >
                Polytechnic University of the Philippines
            </p>

        </div>

    </header>



    {{-- Login Area --}}
    <main class="relative flex-1 flex justify-center px-6 -mt-6">


        <div
            data-auth-card
            class="w-full max-w-md bg-white rounded-xl shadow-lg border border-gray-200 p-8 h-fit"
        >

            {{ $slot }}

        </div>


    </main>


    {{-- Footer --}}
    <footer class="relative text-center py-6 text-sm text-gray-400">

        © {{ date('Y') }} Polytechnic University of the Philippines

    </footer>


</div>


</body>

</html>