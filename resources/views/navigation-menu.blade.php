<nav class="border-b">
    <div x-data="{showMenu : false}" class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Brand-->
        <a href="/" class="flex items-center">
            <img src="{{ asset('image/logo-purple.png') }}" class="h-8 mr-3" alt="how to laravel logo" />
            {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap">H2Laravel</span> --}}
        </a>
        <div class="flex md:order-2">
            @auth
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <button class="text-white bg-purple-800 hover:bg-purple-500 font-medium rounded-sm text-sm px-6 py-2 text-center mr-3 md:mr-0">
                        {{ __('Sign Out') }}
                    </button>
                </form>
            @endauth
            
            <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-cta" aria-expanded="false" @click="showMenu = !showMenu">
              <span class="sr-only">Open main menu</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
              {{-- <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
              </svg> --}}
          </button>
        </div>
        <!-- Nav Links-->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" :class="{ 'block absolute top-14 border-b bg-white w-full p-2 z-10': showMenu, 'hidden': !showMenu}"
        id="navbar-main" x-cloak>
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:border-0 md:dark:bg-gray-900">
                <li class="block py-2 pl-3 pr-4 text-purple-800  rounded md:bg-transparent md:text-purple-800 md:p-0 md:dark:text-blue-500" aria-current="page" :class="showMenu && 'py-1'">
                    <a href="/">Tutorials</a>
                </li>
                {{-- <li class="block py-2 pl-3 pr-4 text-purple-800 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-800 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent" :class="showMenu && 'py-1'">
                    <a href="#">Livewire</a>
                </li>
                <li class="block py-2 pl-3 pr-4 text-purple-800 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-800 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent" :class="showMenu && 'py-1'">
                    <a href="#">TailwindCSS</a>
                </li>
                <li class="block py-2 pl-3 pr-4 text-purple-800 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-800 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent" :class="showMenu && 'py-1'">
                    <a href="#">Alpine JS</a>
                </li>
                <li class="block py-2 pl-3 pr-4 text-purple-800 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-800 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent" :class="showMenu && 'py-1'">
                    <a href="#">About</a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>