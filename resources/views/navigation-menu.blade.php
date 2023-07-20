<nav class="border-b">
    <div x-data="{showMenu : false}" class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Brand-->
        <a href="/" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="how to laravel logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">H2Laravel</span>
        </a>
        <div class="flex md:order-2">
            @auth
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <button class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0">
                        {{ __('Log Out') }}
                    </button>
                </form>
            @endauth
            
            <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-cta" aria-expanded="false" @click="showMenu = !showMenu">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
              </svg>
          </button>
        </div>
        <!-- Nav Links-->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" :class="{ 'block absolute top-14 border-b bg-white w-full p-2 z-10': showMenu, 'hidden': !showMenu}"
        id="navbar-main" x-cloak>
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:border-0 md:dark:bg-gray-900">
                <li class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page" :class="showMenu && 'py-1'">
                    <a href="/">Tutorials</a>
                </li>
                <li class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent" :class="showMenu && 'py-1'">
                    <a href="#">Livewire</a>
                </li>
                <li class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent" :class="showMenu && 'py-1'">
                    <a href="#">TailwindCSS</a>
                </li>
                <li class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent" :class="showMenu && 'py-1'">
                    <a href="#">Alpine JS</a>
                </li>
                <li class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent" :class="showMenu && 'py-1'">
                    <a href="#">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>