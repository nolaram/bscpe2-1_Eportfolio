<x-app-layout>

<div class="p-6">

    <h1>Assign Adviser</h1>

    <br>

    <strong>Student:</strong>

    {{ $student->first_name }}
    {{ $student->last_name }}

    <br><br>

    <form
        action="{{ route('admin.students.assign-adviser.update', $student) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <label>Adviser</label>

        <br>

        <select name="adviser_id">

            <option value="">
                -- Select Adviser --
            </option>

            @foreach($advisers as $adviser)

                <option
                    value="{{ $adviser->id }}"
                    @selected($student->adviser_id == $adviser->id)
                >

                    {{ $adviser->last_name }},
                    {{ $adviser->first_name }}

                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">

            Save Assignment

        </button>

    </form>

</div>

</x-app-layout>