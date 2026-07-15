@extends('layouts.dashboard')

@section('title', 'Student Dashboard')

@section('page-title', 'Dashboard')

@section('content')

<div class="space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Welcome back.
        </h1>

        <p class="mt-1 text-gray-500">
            Here's an overview of your OJT progress.
        </p>
    </div>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">

        <x-stats-card
            title="OJT Hours"
            value=""
            icon=""
        />

        <x-stats-card
            title="Daily Logs"
            value=""
            icon=""
        />

        <x-stats-card
            title="Weekly Reports"
            value=""
            icon=""
        />

        <x-stats-card
            title="Documents"
            value=""
            icon=""
        />

    </div>

</div>

@endsection