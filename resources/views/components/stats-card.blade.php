@props([
    'title',
    'value',
    'icon' => '📊',
])

<div class="rounded-xl bg-white p-6 shadow-sm border border-gray-200 hover:shadow-md transition">
    <div class="flex items-center justify-between">

        <div>
            <p class="text-sm text-gray-500">
                {{ $title }}
            </p>

            <h2 class="mt-2 text-3xl font-bold text-gray-800">
                {{ $value }}
            </h2>
        </div>

        <div class="text-3xl">
            {{ $icon }}
        </div>

    </div>
</div>