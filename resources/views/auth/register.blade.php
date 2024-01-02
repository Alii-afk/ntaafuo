<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-slot name="tagline" class="flex justify-center">
            <span class="tag-line" style="display: block; margin: auto; text-align: center; ">Ghana’s Favourite Apartment-Share</span>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" class="login-form">
            @csrf

            <!-- Name -->
            <!-- <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div> -->

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            @if(session()->has('userType'))
            <div class="mt-4">
                <x-input type="hidden" name="userType" value="{{ session('userType') }}" required />
            </div>
            @else
            <div class="mt-4">
                <x-label for="userType" :value="__('Account Type')" />
                <select name="userType" id="userType" class="block mt-1 w-full" required autofocus>
                    <option value="lessee">Looking for a room</option>
                    <option value="lessor">Looking for a roomie</option>
                </select>
            </div>
            @endif


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <!-- Show Password -->
            <div class="block mt-4">
                <label for="show_password" class="inline-flex items-center">
                    <input id="show_password" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" onclick="myFunction()">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Show Password') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>

            <div class="flex items-center justify-center mt-4">
                <span class="text-sm">Already have an account? &nbsp;</span>

                <a class="underline text-sm text-blue hover:text-gray-900" href="{{ route('login') }}">
                    {{ __(' Sign In') }}
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>