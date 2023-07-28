<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        @livewireStyles
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- Turbolink script to enable spa mode --}}
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
        <script src="https://cdn.tiny.cloud/1/79eyn3jibibmxxymr9ew45lk0138t4ymxnpqfaourimz5wxr/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        @livewireScripts
        @stack('scripts')
    </head>
    <body class="font-sans antialiased">
        {{-- <x-banner /> --}}
        @livewire('navbar')

        <div class="min-h-screen ">

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        {{-- @stack('modals') --}}
        
    </body>
</html>
