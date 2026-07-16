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
        \Carbon\Carbon::parse($dailyAttendance->time_in)->format('H:i')
    ) }}"
>

<br><br>

<p>Time Out</p>

<input
    type="time"
    name="time_out"
    value="{{ old(
        'time_out',
        \Carbon\Carbon::parse($dailyAttendance->time_out)->format('H:i')
    ) }}"
>

<div class="mt-4">

    <label>

        <input
            type="checkbox"
            name="has_lunch_break"
            value="1"
            @checked($dailyAttendance->has_lunch_break)
        >

        Deduct 1-hour lunch break

    </label>

</div>

<br><br>

<button type="submit">

Update Attendance

</button>

</form>

</div>

</x-app-layout>