@if ($errors->any())
<div style="color:red;">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<x-app-layout>

<div class="p-6">

<h1>Edit Attendance</h1>

<form
    method="POST"
    action="{{ route(
        'student.student.daily-attendances.update',
        $dailyAttendance
    ) }}"
>

@csrf
@method('PUT')

<p>Date</p>

<input
    type="date"
    name="attendance_date"
    value="{{ old(
        'attendance_date',
        $dailyAttendance->attendance_date
    ) }}"
>

<br><br>

<p>Time In</p>

<input
    type="time"
    name="time_in"
    value="{{ old(
        'time_in',
        $dailyAttendance->time_in
    ) }}"
>

<br><br>

<p>Time Out</p>

<input
    type="time"
    name="time_out"
    value="{{ old(
        'time_out',
        $dailyAttendance->time_out
    ) }}"
>

<br><br>

<button type="submit">

Update Attendance

</button>

</form>

</div>

</x-app-layout>