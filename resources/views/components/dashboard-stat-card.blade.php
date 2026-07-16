@props([
    'title',
    'value',
    'icon' => null,
])

<div
    class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition hover:shadow-md"
>

    <div class="flex items-center justify-between">

        <div>

            <p class="text-sm font-medium text-gray-500">
                {{ $title }}
            </p>

            <h2 class="mt-2 text-3xl font-bold text-gray-900">
                {{ $value }}
            </h2>

        </div>

        @if($icon)

            <div class="rounded-xl bg-primary/10 p-3 text-primary">

                {{ $icon }}

            </div>

        @endif

    </div>

</div>