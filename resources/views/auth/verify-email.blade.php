<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-slot name="tagline">
            <span class="tag-line" style="display:block; margin:auto;">Ghana’s Favourite Apartment-Share</span>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600" style="padding:20px;">
            {{ __('Thanks for joining! Before you continue, kindly confirm your email by clicking the link we sent. If it\'s not in your inbox, please check your spam folder, just in case') }}
        </div>

        @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600" style="padding:20px;">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
        @endif

        <div class="mt-4 flex items-center justify-between" style="padding:20px;">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>