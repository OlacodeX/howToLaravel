<x-guest-layout>

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />
        <h1 class="text-4xl font-black pt-8 pb-2">
            Create Account
        </h1>
        <p class="pr-8 text-lg">Just a few details and you are good to go...</p>
        <form method="POST" action="{{ route('register') }}" class="pt-8">
            @csrf

            <div>
                {{-- <x-label for="name" value="{{ __('Name') }}" /> --}}
                <x-input id="name" class="block mt-1 w-full bg-gray-50 rounded-none py-3 border-none shadow text-gray-900 text-sm" type="text" name="name" :value="old('name')" required placeholder="Your name" autocomplete="name" />
            </div>

            <div class="mt-6">
                {{-- <x-label for="email" value="{{ __('Email') }}" /> --}}
                <x-input id="email" class="block mt-1 w-full bg-gray-50 rounded-none py-3 border-none shadow text-gray-900 text-sm" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Your email" />
            </div>

            <div class="mt-6">
                {{-- <x-label for="password" value="{{ __('Password') }}" /> --}}
                <x-input id="password" class="block mt-1 w-full bg-gray-50 rounded-none py-3 border-none shadow text-gray-900 text-sm" type="password" name="password" required autocomplete="new-password" placeholder="Your password"/>
            </div>

            <div class="mt-6">
                {{-- <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" /> --}}
                <x-input id="password_confirmation" class="block mt-1 w-full bg-gray-50 rounded-none py-3 border-none shadow text-gray-900 text-sm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Your password again"/>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md ">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md ">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md " href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
