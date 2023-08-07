<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
        <meta name="keywords" content="@yield('meta_keywords','Laravel, Learn Laravel, MySQL, PHP')">
        <meta name="description" content="@yield('meta_description','')">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/prism.css') }}">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- icon --}}
        <link rel="icon" href="{{ asset('image/logo-no-bg-white.png') }}" type="image/x-icon">

        <!-- Styles -->
        @livewireStyles
        
        {{-- Turbolink script to enable spa mode --}}
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
        <script src="{{ asset('js/prism.js') }}"></script>
        @livewireScripts
        
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div>
            @livewire('navigation-menu')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
    </body>
</html>
