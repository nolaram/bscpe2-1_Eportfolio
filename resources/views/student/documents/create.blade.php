@extends('layouts.dashboard')

@section('title', 'Upload Document')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="rounded-2xl bg-white shadow-sm p-8">

        <div class="mb-8">

            <a
                href="{{ route('student.student.documents.index') }}"
                class="text-primary hover:underline"
            >
                ← Back to Documents
            </a>

        </div>

        <h1 class="text-3xl font-bold">

            Upload Document

        </h1>

        <p class="mt-2 text-gray-500">

            Upload the required document below.

        </p>

        <form
            action="{{ route('student.student.documents.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="mt-8 space-y-6"
        >

            @csrf

            <input
                type="hidden"
                name="category"
                value="{{ $category }}"
            >

            <input
                type="hidden"
                name="document_name"
                value="{{ $documentName }}"
            >

            <div>

                <label class="block mb-2 font-medium">

                    Category

                </label>

                <div class="rounded-lg border bg-gray-100 px-4 py-3">

                    {{ $category }}

                </div>

            </div>

            <div>

                <label class="block mb-2 font-medium">

                    Required Document

                </label>

                <div class="rounded-lg border bg-gray-100 px-4 py-3">

                    {{ $documentName }}

                </div>

            </div>

            <div>

                <label class="block mb-2 font-medium">

                    Select File

                </label>

                <input
                    type="file"
                    name="document_file"
                    class="w-full rounded-lg border p-3"
                >

                <p class="mt-2 text-sm text-gray-500">

                    Maximum size: 10 MB

                </p>

                @error('document_file')

                    <p class="mt-2 text-red-500">

                        {{ $message }}

                    </p>

                @enderror

            </div>

            <div class="flex justify-end">

                <button
                    class="rounded-lg bg-primary px-6 py-3 text-white"
                >

                    Upload Document

                </button>

            </div>

        </form>

    </div>

</div>

@endsection