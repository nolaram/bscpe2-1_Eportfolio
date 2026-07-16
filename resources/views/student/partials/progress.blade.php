<x-section-card title="OJT Progress">

    <div class="space-y-4">

        <div class="flex justify-between text-sm text-gray-600">

            <span>

                {{ $statistics['total_hours'] }}
                /
                {{ $statistics['required_hours'] }}
                Hours Completed

            </span> 

            <span>

                {{ $statistics['progress_percentage'] }}%

            </span>

        </div>

        <div class="h-3 w-full rounded-full bg-gray-200">

            <div
                class="h-3 rounded-full bg-primary"
                style="width: {{ $statistics['progress_percentage'] . '%' }};"
            ></div> 

        </div>

        <p class="text-sm text-gray-500">

            {{ $statistics['remaining_hours'] }}
            hours remaining

        </p>

    </div>

</x-section-card>