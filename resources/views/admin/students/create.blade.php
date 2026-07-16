@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<x-app-layout>

<div class="p-6">

<h1>Add Student</h1>

<form action="{{ route('admin.students.store') }}" method="POST">

    @csrf

    <p>
        Student Number
    </p>

    <input
        type="text"
        name="student_number"
    >

    <br><br>

    <p>
        First Name
    </p>

    <input
        type="text"
        name="first_name"
    >

    <br><br>

    <p>
        Last Name
    </p>

    <input
        type="text"
        name="last_name"
    >

    <br><br>

    <p>
        Email
    </p>

    <input
        type="email"
        name="email"
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