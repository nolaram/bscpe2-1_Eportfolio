@extends('layouts.adviser-dashboard')

@section('title', 'Student Attendance')

@section('page-title', 'Student Attendance')

@section('content')

<h1>

{{ $student->last_name }},
{{ $student->first_name }}

</h1>

<br>

<table border="1" cellpadding="10">

<thead>

<tr>

<th>Date</th>

<th>Time In</th>

<th>Time Out</th>

<th>Hours</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>

<tbody>

@forelse($attendances as $attendance)

<tr>

<td>{{ $attendance->attendance_date }}</td>

<td>{{ $attendance->time_in }}</td>

<td>{{ $attendance->time_out }}</td>

<td>{{ $attendance->hours_rendered }}</td>

<td>{{ $attendance->status }}</td>

<td>

<a href="{{ route(
    'adviser.attendances.show',
    $attendance
) }}">
    Review
</a>

</a>

</td>

</tr>

<tr>

    <th>Lunch Break</th>

    <td>

        {{ $attendance->has_lunch_break ? 'Yes' : 'No' }}

    </td>

</tr>

@empty

<tr>

<td colspan="6">

No attendance records.

</td>

</tr>

@endforelse

</tbody>

</table>

<br>

{{ $attendances->links() }}

@endsection