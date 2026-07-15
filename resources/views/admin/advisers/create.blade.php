<x-app-layout>

<div class="p-6">

    <h1>Add Adviser</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.advisers.store') }}" method="POST">

        @csrf

        <p>First Name</p>
        <input
            type="text"
            name="first_name"
            value="{{ old('first_name') }}"
        >

        <br><br>

        <p>Middle Name</p>
        <input
            type="text"
            name="middle_name"
            value="{{ old('middle_name') }}"
        >

        <br><br>

        <p>Last Name</p>
        <input
            type="text"
            name="last_name"
            value="{{ old('last_name') }}"
        >

        <br><br>

        <p>Department</p>
        <input
            type="text"
            name="department"
            value="{{ old('department') }}"
        >

        <br><br>

        <p>Contact Number</p>
        <input
            type="text"
            name="contact_number"
            value="{{ old('contact_number') }}"
        >

        <br><br>

        <p>Email</p>
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
        >

        <br><br>

        <p>Password</p>
        <input
            type="password"
            name="password"
        >

        <br><br>

        <p>Confirm Password</p>
        <input
            type="password"
            name="password_confirmation"
        >

        <br><br>

        <button type="submit">
            Save Adviser
        </button>

    </form>

</div>

</x-app-layout>