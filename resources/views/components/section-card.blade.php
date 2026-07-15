@props([
    'title'
])

<div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

    <div class="mb-4">

        <h2 class="text-lg font-semibold text-gray-800">
            {{ $title }}
        </h2>

    </div>

    {{ $slot }}

</div>