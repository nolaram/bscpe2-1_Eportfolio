<x-app-layout>

<div class="p-6">

<h1>Assigned Students</h1>

<br>

<table border="1" cellpadding="10">

<thead>

<tr>

<th>Student No.</th>

<th>Name</th>

<th>Action</th>

</tr>

</thead>

<tbody>

@forelse($students as $student)

<tr>

<td>{{ $student->student_number }}</td>

<td>

{{ $student->last_name }},
{{ $student->first_name }}

</td>

<td>

<a href="{{ route(
    'adviser.attendances.index',
    $student
) }}">

View Attendance

</a>

</td>

</tr>

@empty

<tr>

<td colspan="3">

No assigned students.

</td>

</tr>

@endforelse

</tbody>

</table>

<br>

{{ $students->links() }}

</div>

</x-app-layout>