<x-app-layout>

    <div class="p-8">


        {{-- Page Heading --}}
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-900">
                Edit Attendance
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Update your daily OJT attendance details.
            </p>

        </div>



        {{-- Validation Errors --}}
        @if ($errors->any())

            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">

                <h3 class="font-semibold text-red-700">
                    Please fix the following errors:
                </h3>


                <ul class="mt-2 list-disc list-inside text-sm text-red-600">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif




        {{-- Form Card --}}
        <div class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm">


            <div class="mb-8">

                <h2 class="text-lg font-semibold text-gray-900">
                    Attendance Information
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Modify your attendance record below.
                </p>

            </div>




            <form
                method="POST"
                action="{{ route(
                    'student.student.daily-attendances.update',
                    $dailyAttendance
                ) }}"
            >

                @csrf
                @method('PUT')



                {{-- Date --}}
                <div class="mb-6">

                    <label class="block text-sm font-medium text-gray-700">
                        Date
                    </label>


                    <input
                        type="date"
                        name="attendance_date"
                        value="{{ old(
                            'attendance_date',
                            $dailyAttendance->attendance_date
                        ) }}"
                        class="mt-2 w-full rounded-lg border border-gray-300
                               px-4 py-2.5
                               focus:border-primary focus:ring-2
                               focus:ring-primary/20
                               outline-none transition"
                    >

                </div>




                {{-- Time --}}
                <div class="mb-8 grid grid-cols-1 gap-6 md:grid-cols-2">


                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            Time In
                        </label>


                        <input
                            type="time"
                            name="time_in"
                            value="{{ old(
                                'time_in',
                                $dailyAttendance->time_in
                            ) }}"
                            class="mt-2 w-full rounded-lg border border-gray-300
                                   px-4 py-2.5
                                   focus:border-primary focus:ring-2
                                   focus:ring-primary/20
                                   outline-none transition"
                        >

                    </div>



                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            Time Out
                        </label>


                        <input
                            type="time"
                            name="time_out"
                            value="{{ old(
                                'time_out',
                                $dailyAttendance->time_out
                            ) }}"
                            class="mt-2 w-full rounded-lg border border-gray-300
                                   px-4 py-2.5
                                   focus:border-primary focus:ring-2
                                   focus:ring-primary/20
                                   outline-none transition"
                        >

                    </div>


                </div>




                {{-- Buttons --}}
                <div class="flex justify-end gap-3">


                    <a
                        href="{{ route('student.student.daily-attendances.index') }}"
                        class="rounded-lg border border-gray-300
                               px-5 py-2.5 text-gray-700
                               transition hover:bg-gray-100"
                    >

                        Cancel

                    </a>



                    <button
                        type="submit"
                        class="rounded-lg bg-primary px-5 py-2.5
                               font-medium text-white
                               transition hover:opacity-90"
                    >

                        Update Attendance

                    </button>


                </div>


            </form>


        </div>


    </div>


</x-app-layout>