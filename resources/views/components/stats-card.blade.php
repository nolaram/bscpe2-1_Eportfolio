@props([
    'title',
    'value',
    'icon' => null,
])

<div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

    <div class="flex items-center justify-between">

        <div>
            <p class="text-sm text-gray-500">
                {{ $title }}
            </p>

            <h3 class="mt-2 text-3xl font-bold text-gray-800">
                {{ $value }}
            </h3>
        </div>

        @if($icon)
            <div class="text-3xl">
                {{ $icon }}
            </div>
        @endif

    </div>

</div>