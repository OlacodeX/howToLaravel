<div class="container bg-hero mx-auto lg:px-20 md:px-20 sm:px-10 lg:overflow-hidden md:overflow-hidden sm:overflow-visible lg:h-[800px] md:h-[800px] sm:h-full bg-gray-100 lg:mt-14 md:mt-14 sm:mt-0 lg:pb-4 md:pb-4 sm:pb-16 sm:mb-8 lg:mb-0 md:mb-0">
    <div class="grid lg:grid-cols-2 md:grid-cols-2 gap-x-40 px-8 lg:pt-24 sm:pt-24 md:pt-24 sm:grid-cols-none">
        <div class="pr-12">
            {{ $logo }}
            @if (request()->is('register'))
                <p class="pr-24 text-lg">Let's get you started with an account!</p>
            @elseif (request()->is('login'))
                <p class="pr-24 text-lg">Let's get down to business here!</p> 
                <p class="text-lg">No account? register <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md" href="/register">here</a></p>
            @else
            <p class="pr-24 text-lg">Let's help you get back your account!</p> 
            @endif
            
        </div>
    
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>
