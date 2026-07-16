@extends('layouts.admin')

@section('title', 'Add Adviser')

@section('page-title', 'Add Adviser')

@section('content')

    <div class="p-8">


        {{-- Page Heading --}}
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-900">
                Add Adviser
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Create a new OJT adviser account.
            </p>

        </div>



        {{-- Error Messages --}}
        @if ($errors->any())

            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">

                <h3 class="font-semibold text-red-700">
                    Please fix the following errors:
                </h3>


                <ul class="mt-2 list-disc list-inside text-sm text-red-600">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif




        {{-- Form Card --}}
        <div class="rounded-xl border border-gray-200 bg-white p-8 shadow-sm">


            <div class="mb-8">

                <h2 class="text-lg font-semibold text-gray-900">
                    Adviser Information
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Enter the adviser's details below.
                </p>

            </div>




            <form
                action="{{ route('admin.advisers.store') }}"
                method="POST"
            >

                @csrf



                {{-- Names --}}
                <div class="mb-6 grid grid-cols-1 gap-6 md:grid-cols-3">


                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            First Name
                        </label>

                        <input
                            type="text"
                            name="first_name"
                            value="{{ old('first_name') }}"
                            class="mt-2 w-full rounded-lg border border-gray-300
                                   px-4 py-2.5
                                   focus:border-primary focus:ring-2
                                   focus:ring-primary/20
                                   outline-none transition"
                        >

                    </div>



                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            Middle Name
                        </label>

                        <input
                            type="text"
                            name="middle_name"
                            value="{{ old('middle_name') }}"
                            class="mt-2 w-full rounded-lg border border-gray-300
                                   px-4 py-2.5
                                   focus:border-primary focus:ring-2
                                   focus:ring-primary/20
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
                            value="{{ old('last_name') }}"
                            class="mt-2 w-full rounded-lg border border-gray-300
                                   px-4 py-2.5
                                   focus:border-primary focus:ring-2
                                   focus:ring-primary/20
                                   outline-none transition"
                        >

                    </div>


                </div>




                {{-- Department --}}
                <div class="mb-6">

                    <label class="block text-sm font-medium text-gray-700">
                        Department
                    </label>


                    <input
                        type="text"
                        name="department"
                        value="{{ old('department') }}"
                        class="mt-2 w-full rounded-lg border border-gray-300
                               px-4 py-2.5
                               focus:border-primary focus:ring-2
                               focus:ring-primary/20
                               outline-none transition"
                    >

                </div>




                {{-- Contact --}}
                <div class="mb-6">

                    <label class="block text-sm font-medium text-gray-700">
                        Contact Number
                    </label>


                    <input
                        type="text"
                        name="contact_number"
                        value="{{ old('contact_number') }}"
                        class="mt-2 w-full rounded-lg border border-gray-300
                               px-4 py-2.5
                               focus:border-primary focus:ring-2
                               focus:ring-primary/20
                               outline-none transition"
                    >

                </div>




                {{-- Account --}}
                <div class="mb-8 grid grid-cols-1 gap-6 md:grid-cols-2">


                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            Email
                        </label>


                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="mt-2 w-full rounded-lg border border-gray-300
                                   px-4 py-2.5
                                   focus:border-primary focus:ring-2
                                   focus:ring-primary/20
                                   outline-none transition"
                        >

                    </div>



                    <div></div>



                    <div>

                        <label class="block text-sm font-medium text-gray-700">
                            Password
                        </label>


                        <input
                            type="password"
                            name="password"
                            class="mt-2 w-full rounded-lg border border-gray-300
                                   px-4 py-2.5
                                   focus:border-primary focus:ring-2
                                   focus:ring-primary/20
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
                        href="{{ route('admin.advisers.index') }}"
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

                        Save Adviser

                    </button>


                </div>



            </form>


        </div>


    </div>

@endsection