<x-app-layout>

<div class="p-8">

    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-900">
            Add Student
        </h1>

        <p class="mt-2 text-sm text-gray-500">
            Create a new student account for the OJT E-Portfolio system.
        </p>

    </div>

    <form action="{{ route('admin.students.store') }}" method="POST">

        @csrf

        <div class="mb-8">

            <h2 class="text-lg font-semibold text-gray-900">
                Student Information
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Fill in the required information below.
            </p>

        </div>

        <div class="mb-6">

            <label class="block text-sm font-medium text-gray-700">
                Student Number
            </label>

            <input
                type="text"
                name="student_number"
                class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5
                    focus:border-primary focus:ring-2 focus:ring-primary/20
                    outline-none transition"
            />

        </div>

        <div class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>

                    <label class="block text-sm font-medium text-gray-700">
                        First Name
                    </label>

                    <input
                        type="text"
                        name="first_name"
                        class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5
                            focus:border-primary focus:ring-2 focus:ring-primary/20
                            outline-none transition"
                    >

                </div>

                <div>

                    <label class="block text-sm font-medium text-gray-700">
                        Last Name
                    </label>

                    <input
                        type="text"
                        name="last_name"
                        class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5
                            focus:border-primary focus:ring-2 focus:ring-primary/20
                            outline-none transition"
                    >

                </div>

            </div>
        </div>

        <div class="mb-6">

            <label class="block text-sm font-medium text-gray-700">
                Email
            </label>

            <input
                type="email"
                name="email"
                class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5
                    focus:border-primary focus:ring-2 focus:ring-primary/20
                    outline-none transition"
            />

        </div>

        <div class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>

                    <label class="block text-sm font-medium text-gray-700">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5
                            focus:border-primary focus:ring-2 focus:ring-primary/20
                            outline-none transition"
                    >

                </div>

                <div>

                    <label class="block text-sm font-medium text-gray-700">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2.5
                            focus:border-primary focus:ring-2 focus:ring-primary/20
                            outline-none transition"
                    >

                </div>

            </div>
        </div>

        <div class="flex justify-end gap-3">

            <a
                href="{{ route('admin.students.index') }}"
                class="rounded-lg border border-gray-300 px-5 py-2.5
                    text-gray-700 hover:bg-gray-100 transition"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="rounded-lg bg-primary px-5 py-2.5
                    text-white font-medium hover:opacity-90 transition"
            >
                Save Student
            </button>

        </div>

    </form>

</div>

</x-app-layout>