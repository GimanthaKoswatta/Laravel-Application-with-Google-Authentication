<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mb-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Login Button and Forgot Password -->
        <div class="flex items-center justify-between mb-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Divider with lines and OR -->
    <div class="flex items-center my-6 mb-6">
        <hr class="w-full border-gray-300">
        <span class="px-3 text-gray-500 font-semibold">OR</span>
        <hr class="w-full border-gray-300">
    </div>

    <!-- Google Login Button -->
    <div class="flex items-center justify-center mb-6">
        <a href="{{ route('google-auth') }}" class="bg-white hover:bg-gray-500 text-gray-900 font-semibold py-2 px-6 rounded-lg flex items-center shadow-md transition duration-300 ease-in-out w-full max-w-xs justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="h-6 w-8 mr-8">
                <path fill="#EA4335" d="M24 9.5c3.4 0 6.2 1.2 8.5 3.5l6.2-6.2C34.7 3 29.7 1 24 1 14.7 1 7 6.9 3.6 14.6l7.3 5.7C13.5 12.3 18.2 9.5 24 9.5z"/>
                <path fill="#4285F4" d="M46.5 24.5c0-1.5-.1-3-.3-4.5H24v9h12.7c-1 4.6-4.6 8.5-9.3 10.4l7.3 5.7c5.6-5.1 8.8-12.7 8.8-20.6z"/>
                <path fill="#FBBC05" d="M10.9 29.9c-1.4-4.2-1.4-8.6 0-12.9L3.6 11.3c-3.5 7-3.5 15 0 22.1l7.3-5.7z"/>
                <path fill="#34A853" d="M24 46c5.7 0 10.4-1.9 14-5.2l-7.3-5.7c-2.1 1.4-4.9 2.3-7.7 2.3-5.8 0-10.6-3.9-12.4-9.3l-7.3 5.7C7 41.1 14.7 46 24 46z"/>
                <path fill="none" d="M1 1h46v46H1z"/>
            </svg>
            {{ __('Login with Google') }}
        </a>
    </div>  
</x-guest-layout>