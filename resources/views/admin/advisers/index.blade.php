<x-app-layout>

<div class="p-6">

    <h1>Adviser Management</h1>

    <br>

    <a href="{{ route('admin.advisers.create') }}">
        Add Adviser
    </a>

    <br><br>

    <table border="1" cellpadding="10">

        <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @forelse($advisers as $adviser)

            <tr>

                <td>
                    {{ $adviser->first_name }}
                    {{ $adviser->last_name }}
                </td>

                <td>
                    {{ $adviser->department }}
                </td>

                <td>
                    {{ $adviser->user->email }}
                </td>

                <td>

                    <a href="{{ route('admin.advisers.edit', $adviser) }}">
                        Edit
                    </a>

                    <form
                        action="{{ route('admin.advisers.destroy', $adviser) }}"
                        method="POST"
                        style="display:inline;"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('Delete this adviser?')"
                        >
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4">

                    No advisers found.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</x-app-layout>