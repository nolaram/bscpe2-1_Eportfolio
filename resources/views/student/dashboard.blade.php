@extends('layouts.dashboard')

@section('title', 'Student Dashboard')

@section('page-title', 'Student Dashboard')

@section('content')

<div class="space-y-6">

    @include('student.partials.welcome', ['student' => $student])
    @include('student.partials.stats', ['student' => $student])
    @include('student.partials.progress', ['student' => $student])

</div>

@endsection