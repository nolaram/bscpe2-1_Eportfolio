@extends('layouts.adviser-dashboard')

@section('title', 'Review Attendance')

@section('page-title', 'Review Attendance')

@section('content')

<h2 class="text-2xl font-bold mb-6">

Review Attendance

</h2>

<table border="1" cellpadding="10">

<tr>

<th>Student</th>

<td>

{{ $attendance->student->last_name }},
{{ $attendance->student->first_name }}

</td>

</tr>

<tr>

<th>Date</th>

<td>{{ $attendance->attendance_date }}</td>

</tr>

<tr>

<th>Time In</th>

<td>{{ $attendance->time_in }}</td>

</tr>

<tr>

<th>Time Out</th>

<td>{{ $attendance->time_out }}</td>

</tr>

<tr>

<th>Hours Rendered</th>

<td>{{ $attendance->hours_rendered }}</td>

</tr>

<tr>

<th>Status</th>

<td>{{ $attendance->status }}</td>

</tr>

</table>

<br>

@if($attendance->status === 'Pending')

<form
    action="{{ route(
        'adviser.attendances.approve',
        $attendance
    ) }}"
    method="POST"
    style="display:inline;"
>

    @csrf
    @method('PATCH')

    <button type="submit">

        Approve

    </button>

</form>

<form
    action="{{ route(
        'adviser.attendances.reject',
        $attendance
    ) }}"
    method="POST"
    style="display:inline;"
>

    @csrf
    @method('PATCH')

    <button type="submit">

        Reject

    </button>

</form>

@endif

@endsection