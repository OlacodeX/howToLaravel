<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        <h1 class="text-4xl font-black pt-8 pb-2">
            Access Your Account
        </h1>
        <p class="pr-8 text-lg">Let's have your details please...</p>

        <form method="POST" action="{{ route('login') }}" class="pt-8">
            @csrf

            <div>
                {{-- <x-label for="email" value="{{ __('Email') }}" /> --}}
                <x-input id="email" class="block mt-1 w-full bg-gray-50 rounded-none py-3 border-none shadow text-gray-900 text-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Your email" />
            </div>

            <div class="mt-4">
                {{-- <x-label for="password" value="{{ __('Password') }}" /> --}}
                <x-input id="password" class="block mt-1 w-full bg-gray-50 rounded-none py-3 border-none shadow text-gray-900 text-sm" type="password" name="password" required autocomplete="current-password" placeholder="Your password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md " href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
