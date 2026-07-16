<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        @yield('title') - OJT E-Portfolio
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-gray-100 font-sans antialiased">


<header class="bg-white border-b border-gray-200">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-xl font-bold text-primary">
            OJT E-Portfolio
        </h1>


        <div class="text-sm text-gray-600">

            {{ Auth::user()->first_name ?? Auth::user()->name }}

        </div>

    </div>

</header>



<main class="max-w-7xl mx-auto p-8">

    @yield('content')

</main>


</body>

</html>