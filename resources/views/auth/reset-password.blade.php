<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />
        <h1 class="text-4xl font-black pt-8 pb-2">
            Set New Password
        </h1>
        <p class="pr-8 text-lg">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one...</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                {{-- <x-label for="email" value="{{ __('Email') }}" /> --}}
                <x-input id="email" class="block mt-1 w-full bg-gray-50 rounded-none py-3 border-none shadow text-gray-900 text-sm" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                {{-- <x-label for="password" value="{{ __('Password') }}" /> --}}
                <x-input id="password" class="block mt-1 w-full bg-gray-50 rounded-none py-3 border-none shadow text-gray-900 text-sm" type="password" name="password" required autocomplete="new-password" placeholder="Your new password"/>
            </div>

            <div class="mt-4">
                {{-- <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" /> --}}
                <x-input id="password_confirmation" class="block mt-1 w-full bg-gray-50 rounded-none py-3 border-none shadow text-gray-900 text-sm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Your new password again"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
