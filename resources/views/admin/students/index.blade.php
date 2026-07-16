<x-app-layout>

    <x-slot name="header">

        <div>

            <h2 class="font-semibold text-2xl text-gray-900">
                Student Management
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                wowowiwow
            </p>

        </div>

    </x-slot>

    <div class="p-6">

        <div class="flex flex-col gap-4 mb-6 lg:flex-row lg:items-end lg:justify-between">

            <div>

                <h3 class="text-lg font-semibold text-gray-900">
                    Students
                </h3>

                <p class="text-sm text-gray-500">
                    Manage student records.
                </p>

            </div>

            <div class="flex flex-col sm:flex-row gap-3">

                <input
                    type="text"
                    placeholder="Search students..."
                    class="w-full sm:w-72 rounded-lg border border-gray-300 px-4 py-2 text-sm
                        focus:border-primary focus:ring-2 focus:ring-primary/20
                        outline-none transition"
                >

                <a
                    href="{{ route('admin.students.create') }}"
                    class="inline-flex justify-center items-center rounded-lg
                        bg-primary px-5 py-2.5 text-white text-sm font-medium
                        shadow-sm hover:shadow-md hover:opacity-95
                        transition-all duration-200"
                >
                    + Add Student
                </a>

            </div>

        </div>

        <div class="mt-2 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

            <table class="w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">
                <tr>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Student No.
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Name
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Email
                    </th>

                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider text-gray-500">
                        Actions
                    </th>

                </tr>
            </thead>

            <tbody>

            @forelse($students as $student)

                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $student->student_number }}</td>

                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $student->first_name }}
                        {{ $student->last_name }}
                    </td>

                    <td class="px-6 py-4 text-sm text-gray-700">
                        {{ $student->user->email }}
                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            <button
                                class="rounded-md border border-primary px-3 py-1 text-sm text-primary hover:bg-primary hover:text-white transition"
                            >
                                Edit
                            </button>

                            <button
                                class="rounded-md border border-red-500 px-3 py-1 text-sm text-red-500 hover:bg-red-500 hover:text-white transition"
                            >
                                Delete
                            </button>

                        </div>

                    </td>
                </tr>

            @empty

                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-150">
                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                        No students found
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>
</div>

    </div>

</x-app-layout>