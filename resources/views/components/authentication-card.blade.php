<div class="container bg-hero mx-auto px-40 overflow-hidden h-[800px]  bg-gray-100 mt-14">
    <div class="grid grid-cols-2 gap-x-40 px-8 pt-24 ">
        <div class="pr-24">
            {{ $logo }}
            @if (request()->is('register'))
                <p class="pr-24 text-lg">Let's get you started with an account!</p>
            @elseif (request()->is('login'))
                <p class="pr-24 text-lg">Let's get done to business here!</p> 
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
