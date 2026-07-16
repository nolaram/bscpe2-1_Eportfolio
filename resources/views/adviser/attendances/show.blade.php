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

<hr class="my-6">

<div class="rounded-lg bg-green-50 border border-green-200 p-4">

    <h3 class="font-semibold text-green-700">

        Attendance Record

    </h3>

    <p class="mt-2 text-sm text-green-600">

        This attendance has been submitted by the student.
        Advisers may review it at any time.

    </p>

</div>

@endsection