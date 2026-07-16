@extends('layouts.admin')

@section('title', 'Adviser Management')

@section('page-title', 'Adviser Management')

@section('content')

    <div class="p-8">

        {{-- Header --}}
        <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

            <div>

                <h1 class="text-3xl font-bold text-gray-900">
                    Adviser Management
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    View and manage registered OJT advisers.
                </p>

            </div>


            <a
                href="{{ route('admin.advisers.create') }}"
                class="inline-flex items-center justify-center gap-2
                       rounded-lg bg-primary px-5 py-2.5
                       text-sm font-medium text-white
                       shadow-sm transition hover:opacity-90"
            >

                <x-heroicon-o-plus class="h-5 w-5"/>

                Add Adviser

            </a>


        </div>



        {{-- Adviser Table --}}
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">


            <div class="overflow-x-auto">

                <table class="w-full">


                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Name
                            </th>


                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Department
                            </th>


                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Email
                            </th>


                            <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Actions
                            </th>


                        </tr>


                    </thead>



                    <tbody class="divide-y divide-gray-100">


                    @forelse($advisers as $adviser)


                        <tr class="transition hover:bg-gray-50">


                            <td class="px-6 py-4 font-medium text-gray-900">

                                {{ $adviser->first_name }}
                                {{ $adviser->last_name }}

                            </td>



                            <td class="px-6 py-4 text-sm text-gray-700">

                                {{ $adviser->department }}

                            </td>



                            <td class="px-6 py-4 text-sm text-gray-600">

                                {{ $adviser->user->email }}

                            </td>




                            <td class="px-6 py-4">


                                <div class="flex justify-center gap-2">


                                    <a
                                        href="{{ route('admin.advisers.edit', $adviser) }}"
                                        class="inline-flex items-center gap-1 rounded-md
                                               border border-gray-300 px-3 py-1.5
                                               text-sm text-gray-700 transition
                                               hover:bg-gray-100"
                                    >

                                        <x-heroicon-o-pencil-square class="h-4 w-4"/>

                                        Edit

                                    </a>




                                    <form
                                        action="{{ route('admin.advisers.destroy', $adviser) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            onclick="return confirm('Delete this adviser?')"
                                            class="inline-flex items-center gap-1 rounded-md
                                                   border border-red-200 px-3 py-1.5
                                                   text-sm text-red-600 transition
                                                   hover:bg-red-50"
                                        >

                                            <x-heroicon-o-trash class="h-4 w-4"/>

                                            Delete

                                        </button>


                                    </form>


                                </div>


                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td
                                colspan="4"
                                class="px-6 py-12 text-center text-gray-500"
                            >

                                No advisers found.

                            </td>

                        </tr>


                    @endforelse


                    </tbody>


                </table>


            </div>


        </div>


    </div>


@endsection