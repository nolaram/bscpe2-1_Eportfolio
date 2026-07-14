<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
</head>
<body>

<h1>Student Management</h1>

<a href="{{ route('admin.students.create') }}">
    Add Student
</a>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Student Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>

    @forelse($students as $student)

        <tr>
            <td>{{ $student->student_number }}</td>
            <td>{{ $student->user->name }}</td>
            <td>{{ $student->user->email }}</td>

            <td>

                <a href="{{ route('admin.students.edit', $student) }}">
                    Edit
                </a>

                |

                <form
                    action="{{ route('admin.students.destroy', $student) }}"
                    method="POST"
                    style="display:inline;"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Delete
                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="4">
                No students found.
            </td>

        </tr>

    @endforelse

    </tbody>

</table>

</body>
</html>