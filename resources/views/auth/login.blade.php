<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" >
                <x-application-logo class=" w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <x-slot name="tagline" class="flex justify-center">
            <span class="tag-line" style="display: block; margin: auto; text-align: center; ">Ghana’s Favourite Apartment-Share</span>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-4">
                <x-button class="w-100">
                    {{ __('SIGN IN') }}
                </x-button>
            </div>

            <div class="flex items-center justify-center mt-4">
                @if (Route::has('password.request'))
                <span class="text-sm">Forgot &nbsp;</span>
                <a class="underline text-center text-sm text-blue hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Password / Username?') }}
                </a>
                @endif
            </div>
            <div class="flex items-center justify-center mt-4">
                <span class="text-sm">Don't have an account? &nbsp;</span>
                @if(isset($_GET['type']) && in_array($_GET['type'], ['lessor', 'lessee']))
                @php
                session(['userType' => $_GET['type']]);
                @endphp
                @endif
                <a class="underline text-sm text-blue hover:text-gray-900" href="{{ route('register') }}">
                    {{ __(' Sign Up') }}
                </a>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>