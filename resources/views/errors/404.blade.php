
<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <img src="{{ asset('image/404.png') }}" alt="404 page" class="mx-auto">
                <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white mt-2">Something's missing.</p>
                <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Sorry, we can't seem to find the resource you are looking. You'll find lots to explore on the home page. </p>
               
                <a href="/" class="inline-flex text-white bg-purple-800 hover:bg-purple-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" class="w-3.5 h-3.5 pr-4"><style>svg{fill:#ffffff}</style><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                   Back to Homepage
                </a>
            </div>   
        </div>
    </section>
</x-app-layout>