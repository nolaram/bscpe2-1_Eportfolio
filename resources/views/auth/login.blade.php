<x-guest-layout>

    <div
        data-auth-field
        class="mb-8 text-center"
    >

        <h2 class="text-2xl font-bold text-gray-800">
            Welcome Back
        </h2>

    </div>

    <x-auth-session-status
        class="mb-4"
        :status="session('status')" />

    <form
        data-login-form
        method="POST"
        action="{{ route('login') }}"
    >

        @csrf

        <!-- Email -->

        <div data-auth-field>

            <x-input-label
                for="email"
                :value="__('Email')" />

            <x-text-input
                id="email"
                class="block mt-2 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username" />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2" />

        </div>

        <!-- Password -->

        <div
            data-auth-field
            class="mt-6"
        >

            <x-input-label
                for="password"
                :value="__('Password')" />

            <x-text-input
                id="password"
                class="block mt-2 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password" />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2" />

        </div>

        <!-- Remember Me -->

        <div
            data-auth-field
            class="flex items-center justify-between mt-6"
        >

            <label
                for="remember_me"
                class="inline-flex items-center">

                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-red-800 shadow-sm focus:ring-red-700">

                <span class="ml-2 text-sm text-gray-600">
                    Remember me
                </span>

            </label>

            @if (Route::has('password.request'))

                <a
                    href="{{ route('password.request') }}"
                    class="text-sm text-red-800 hover:text-red-900 font-medium">

                    Forgot Password?

                </a>

            @endif

        </div>

        <!-- Login Button -->

        <div
            data-auth-field
            class="mt-8"
        >

            <x-primary-button
                data-login-button
                class="w-full justify-center relative"
            >

                Log In

            </x-primary-button>

        </div>

    </form>

</x-guest-layout>