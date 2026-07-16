<x-app-layout>

    <div class="p-6">

        <h1 class="text-2xl font-bold">
            Admin Dashboard
        </h1>

        <div class="mt-6 space-y-2">

            <a href="{{ route('admin.students.index') }}">
                Manage Students
            </a>

            <br>

            <a href="#">
                Manage Advisers
            </a>

            <br>

            <a href="#">
                Reports
            </a>

        </div>

    </div>

</x-app-layout>