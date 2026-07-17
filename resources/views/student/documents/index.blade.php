@extends('layouts.dashboard')

@section('title', 'Documents')

@section('content')

<div
    x-data="{
        openPreview: false,
        previewFile: '',
        previewType: '',

        showPreview(file) {

            this.previewFile = file;

            const extension = file.split('.').pop().toLowerCase();

            if (extension === 'pdf') {

                this.previewType = 'pdf';

            } else if (
                extension === 'jpg' ||
                extension === 'jpeg' ||
                extension === 'png'
            ) {

                this.previewType = 'image';

            } else {

                this.previewType = 'other';

            }

            this.openPreview = true;
        }
    }"

    class="space-y-8"
>

    <div>

        <h1 class="text-3xl font-bold">

            Internship Documents

        </h1>

        <p class="mt-2 text-gray-500">

            Upload all required internship documents.

        </p>

    </div>

    @if(session('success'))

        <div
            class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-700"
        >

            {{ session('success') }}

        </div>

    @endif

    @foreach($requiredDocuments as $category => $documentList)

        <div class="rounded-2xl bg-white shadow-sm">

            {{-- Header --}}
            <div
                class="flex items-center gap-3 border-b px-8 py-6"
            >

                <x-heroicon-o-folder
                    class="h-8 w-8 text-primary"
                />

                <div>

                    <h2 class="text-2xl font-bold">

                        {{ $category }}

                    </h2>

                    <p class="text-gray-500">

                        Required Documents

                    </p>

                </div>

            </div>

            {{-- Body --}}
            <div class="divide-y">

                @foreach($documentList as $documentName)

                    @php

                        $uploaded = $documents
                            ->where('category', $category)
                            ->where('document_name', $documentName)
                            ->first();

                    @endphp

                    <div
                        class="flex items-center justify-between px-8 py-5"
                    >

                        <div class="flex items-center gap-4">

                            <x-heroicon-o-document-text
                                class="h-7 w-7 text-primary"
                            />

                            <div>

                                <h3 class="font-semibold">

                                    {{ $documentName }}

                                </h3>

                                @if($uploaded)

                                    <p class="text-sm text-green-600">

                                        ✅ Uploaded

                                    </p>

                                @else

                                    <p class="text-sm text-yellow-600">

                                        ⏳ Not Uploaded

                                    </p>

                                @endif

                            </div>

                        </div>

                        <div>

                            @if($uploaded)

                                <div class="flex gap-3">

                                    <button
                                        type="button"
                                        @click="showPreview('{{ asset('storage/'.$uploaded->file_path) }}')"
                                        class="rounded-lg border px-4 py-2 hover:bg-gray-50"
                                    >

                                        View

                                    </button>

                                    <a
                                        href="{{ route('student.student.documents.edit', $uploaded) }}"
                                        class="rounded-lg bg-primary px-4 py-2 text-white"
                                    >

                                        Replace

                                    </a>

                                </div>

                            @else

                                <a
                                    href="{{ route('student.student.documents.create', [
                                        'category' => $category,
                                        'document' => $documentName
                                    ]) }}"
                                    class="rounded-lg bg-primary px-5 py-2 text-white"
                                >

                                    Upload

                                </a>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    @endforeach

    {{-- Preview Modal --}}
    <div
        x-show="openPreview"
        x-transition
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center"
    >

        {{-- Background --}}
        <div
            class="absolute inset-0 bg-black/50 backdrop-blur-sm"
            @click="openPreview = false"
        ></div>

        {{-- Modal --}}
        <div
            class="relative z-10 w-11/12 max-w-6xl rounded-2xl bg-white shadow-2xl"
        >

            <div
                class="flex items-center justify-between border-b px-6 py-4"
            >

                <h2 class="text-xl font-semibold">

                    Document Preview

                </h2>

                <button
                    @click="openPreview = false"
                    class="text-2xl text-gray-500 hover:text-gray-700"
                >

                    &times;

                </button>

            </div>

            <div class="h-[75vh] overflow-auto bg-gray-100">

                {{-- PDF --}}

                <template x-if="previewType === 'pdf'">

                    <iframe
                        :src="previewFile"
                        class="h-full w-full"
                    ></iframe>

                </template>

                {{-- Image --}}

                <template x-if="previewType === 'image'">

                    <div
                        class="flex h-full items-center justify-center"
                    >

                        <img
                            :src="previewFile"
                            class="max-h-full max-w-full object-contain"
                        >

                    </div>

                </template>

                {{-- DOC / DOCX / Others --}}

                <template x-if="previewType === 'other'">

                    <div
                        class="flex h-full flex-col items-center justify-center gap-6"
                    >

                        <x-heroicon-o-document-text
                            class="h-20 w-20 text-gray-400"
                        />

                        <div class="text-center">

                            <h3
                                class="text-2xl font-semibold"
                            >

                                Preview unavailable

                            </h3>

                            <p
                                class="mt-2 text-gray-500"
                            >

                                This file type cannot be previewed inside the browser.

                            </p>

                        </div>

                        <a
                            :href="previewFile"
                            download
                            class="rounded-lg bg-primary px-6 py-3 text-white"
                        >

                            Download File

                        </a>

                    </div>

                </template>

            </div>

            <div
                class="flex justify-end gap-3 border-t px-6 py-4"
            >

                <a
                    :href="previewFile"
                    download
                    class="rounded-lg border px-5 py-2 hover:bg-gray-100"
                >

                    Download

                </a>

                <button
                    @click="openPreview = false"
                    class="rounded-lg bg-primary px-5 py-2 text-white"
                >

                    Close

                </button>

            </div>

        </div>

    </div>

</div>

@endsection