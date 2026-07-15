<x-app-layout>

<div class="p-6">

<h1>Edit Student</h1>

<form action="{{ route('admin.students.update', $student) }}" method="POST">

    @csrf
    @method('PUT')

    <p>
        Student Number
    </p>

    <input
        type="text"
        name="student_number"
        value="{{ old('student_number', $student->student_number) }}"
    >

    <br><br>

    <p>
        First Name
    </p>

    <input
        type="text"
        name="first_name"
        value="{{ old('first_name', $student->first_name) }}"
    >

    <br><br>

    <p>
        Last Name
    </p>

    <input
        type="text"
        name="last_name"
        value="{{ old('last_name', $student->last_name) }}"
    >

    <br><br>

    <p>
        Email
    </p>

    <input
        type="email"
        name="email"
        value="{{ old('email', $student->user->email) }}"
    >

    <br><br>

    <p>
        Password
    </p>

    <input
        type="password"
        name="password"
    >

    <p>Confirm Password</p>

    <input
        type="password"
        name="password_confirmation"
    >

    <br><br>

    <button type="submit">

        Save Student

    </button>

</form>

</div>

</x-app-layout>