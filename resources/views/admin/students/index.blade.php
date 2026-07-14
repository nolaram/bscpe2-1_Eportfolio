<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student Management
        </h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('admin.students.create') }}">
            Add Student
        </a>

        <br><br>

        <table border="1" cellpadding="10">

            <thead>
                <tr>
                    <th>Student No.</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>

            @forelse($students as $student)

                <tr>
                    <td>{{ $student->student_number }}</td>

                    <td>
                        {{ $student->first_name }}
                        {{ $student->last_name }}
                    </td>

                    <td>
                        {{ $student->user->email }}
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="3">
                        No students found.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</x-app-layout>