<x-app-layout>

<div class="p-6">

<h1>Daily Attendance</h1>

<br>

<a href="{{ route('student.student.daily-attendances.create') }}">

Add Attendance

</a>

<br><br>

<table border="1" cellpadding="10">

<thead>

<tr>

    <th>Date</th>

    <th>Time In</th>

    <th>Time Out</th>

    <th>Hours</th>

    <th>Status</th>

    <th>Actions</th>

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

    @if($attendance->status === 'Pending')

        <a
            href="{{ route(
                'student.student.daily-attendances.edit',
                $attendance
            ) }}"
        >
            Edit
        </a>

        |

        <form
            action="{{ route(
                'student.student.daily-attendances.destroy',
                $attendance
            ) }}"
            method="POST"
            style="display:inline;"
        >

            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('Delete this attendance?')"
            >
                Delete
            </button>

        </form>

    @endif

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

</div>

</x-app-layout>