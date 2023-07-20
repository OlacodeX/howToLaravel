<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <h1 class="text-4xl font-black pt-8 pb-2">
            Password Reset Link
        </h1>
        <p class="pr-8 text-lg">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one...</p>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}" class="pt-8">
            @csrf

            <div class="block">
                {{-- <x-label for="email" value="{{ __('Email') }}" /> --}}
                <x-input id="email" class="block mt-1 w-full bg-gray-50 rounded-none py-3 border-none shadow text-gray-900 text-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Your email"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
