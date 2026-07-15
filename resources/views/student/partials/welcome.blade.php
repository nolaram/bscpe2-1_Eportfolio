<div class="space-y-6">

    {{-- Welcome Section --}}
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Welcome, {{ $student->first_name }}!
        </h1>

        <p class="mt-2 text-gray-500">
            Assigned Adviser:
            {{ $student->adviser?->first_name }}
            {{ $student->adviser?->last_name ?? 'Not Assigned' }}
        </p>
    </div>

</div>
