@extends('layouts.dashboard')

@section('title', 'Student Dashboard')

@section('page-title', 'Student Dashboard')

@section('content')

<div class="space-y-6">

    @include('student.partials.welcome')
    @include('student.partials.stats')
    @include('student.partials.progress')

</div>

@endsection