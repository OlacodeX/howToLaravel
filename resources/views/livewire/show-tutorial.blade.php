<div class="hero-section absolute left-0 right-0 bg-cover h-80" style="background-image: url({{ $tutorial->banner }})">

    <div class="pt-40 pb-10 items-start container mx-auto">
        {{-- {{ dd($tutorial) }} --}}
        <h1 class="text-white leading-4 text-3xl font-extrabold">{{ $tutorial->topic }}</h1>
        <p class="text-white pt-4">
            @foreach ($tutorial->tags as $tag)
                <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-purple-400 border border-purple-400">{{ $tag }}</span>
            @endforeach
        </p>
    </div>
</div>
<div class="content relative top-60 bg-white container mx-auto left-0 right-0 pb-16">

<main class="px-8 py-4">
        <div class="flex justify-between">
            <p>By <span class="pr-2">{{ $tutorial->author->name }}</span> {{ $tutorial->created_at }}</p>
            <p class="flex justify-between">
                <a class="pr-4" href=""><img src="/image/icons/facebook.svg" alt=""></a>
                <a class="pr-4" href=""><img src="/image/icons/twitter.svg" alt=""></a>
                <a class="pr-4" href=""><img src="/image/icons/linkedin.svg" alt=""></a>
                {{-- <input type="hidden" id="link" value="Hello World" id="myInput"> --}}
                {{-- <a class="pr-4" href="" id="link" wire:click="copyToClipboard('{{ $tutorial->slug }}')"><img src="/image/icons/share.svg" alt=""></a> --}}
                <button class="pr-4" id="link" onclick="copyToClipboard('{{ config('services.helpers.base_path').'/'.'tutorials/'.$tutorial->slug }}')"><img src="/image/icons/share.svg" alt=""></button>
            </p>
        </div>
        <article class="pt-6">
            <p class="">
                {{ $tutorial->body }}
            </p>
            {{-- <figure><img src={{ $tutorial->banner }} alt="">
            </figure> --}}
        </article>
        <div class="inline-flex items-center justify-center w-full">
            <hr class="w-[100rem] h-1 my-8 bg-gray-200 border-0 rounded dark:bg-gray-700">
            <div class="absolute px-4 -translate-x-1/2 bg-white left-1/2 dark:bg-gray-900">
                <svg class="w-4 h-4 text-gray-700 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                    <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
                </svg>
            </div>
        </div>
        {{-- <div class="comments">
            <h2 class="text-black">Comments</h2>
            <form action="" method="post">
                <div class="flex flex-row">
                    <label for="input-group-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email</label>
                    <div class="relative mb-6">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                            <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                            <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                        </svg>
                    </div>
                    <input type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">
                    </div>
                    <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                        </svg>
                    </span>
                    <input type="text" id="website-admin" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="elonmusk">
                    </div>
                </div>
                
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your message</label>
                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>

            </form>
            @if (count($tutorial->comments) > 0)
                @foreach ($tutorial->comments as $comment)
                <h4>{{ $comment->commentor_name }}</h4>
                <span>{{ $comment->commentor_email }}</span>
                <p>{{ $comment->comment }}</p>
                    
                @endforeach 
            @else
                <p class="text-center">No comments for this tutori</p>
            @endif
        </div> --}}
  </main>
  {{-- <pre><code class="language-html">&lt;dl class="grid grid-cols-2 gap-8 max-w-screen-md text-gray-900 sm:grid-cols-3 dark:text-white"&gt;
    &lt;div class="flex flex-col justify-center items-center"&gt;
      &lt;dt class="mb-2 text-3xl font-extrabold"&gt;73M+&lt;/dt&gt;
      &lt;dd class="text-lg font-normal text-gray-500 dark:text-gray-400"&gt;developers&lt;/dd&gt;
    &lt;/div&gt;
    &lt;div class="flex flex-col justify-center items-center"&gt;
      &lt;dt class="mb-2 text-3xl font-extrabold"&gt;1B+&lt;/dt&gt;
      &lt;dd class="text-lg font-normal text-gray-500 dark:text-gray-400"&gt;contributors&lt;/dd&gt;
    &lt;/div&gt;
    &lt;div class="flex flex-col justify-center items-center"&gt;
      &lt;dt class="mb-2 text-3xl font-extrabold"&gt;4M+&lt;/dt&gt;
      &lt;dd class="text-lg font-normal text-gray-500 dark:text-gray-400"&gt;organizations&lt;/dd&gt;
    &lt;/div&gt;
    &lt;/dl&gt;
    </code></pre> --}}
  {{-- <aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
    <div class="px-4 mx-auto max-w-screen-xl">
        <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Related articles</h2>
        <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
            <article class="max-w-xs">
                <a href="#">
                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-1.png" class="mb-5 rounded-lg" alt="Image 1">
                </a>
                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                    <a href="#">Our first office</a>
                </h2>
                <p class="mb-4 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                <a href="#" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                    Read in 2 minutes
                </a>
            </article>
            <article class="max-w-xs">
                <a href="#">
                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-2.png" class="mb-5 rounded-lg" alt="Image 2">
                </a>
                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                    <a href="#">Enterprise design tips</a>
                </h2>
                <p class="mb-4 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                <a href="#" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                    Read in 12 minutes
                </a>
            </article>
            <article class="max-w-xs">
                <a href="#">
                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-3.png" class="mb-5 rounded-lg" alt="Image 3">
                </a>
                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                    <a href="#">We partnered with Google</a>
                </h2>
                <p class="mb-4 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                <a href="#" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                    Read in 8 minutes
                </a>
            </article>
            <article class="max-w-xs">
                <a href="#">
                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-4.png" class="mb-5 rounded-lg" alt="Image 4">
                </a>
                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                    <a href="#">Our first project with React</a>
                </h2>
                <p class="mb-4 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                <a href="#" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                    Read in 4 minutes
                </a>
            </article>
        </div>
    </div>
  </aside> --}}
</div>
<script>
    const copyToClipboard = (link) => {
        const content = document.getElementById('link').textContent;
        navigator.clipboard.writeText(link);
        // navigator.clipboard.writeText(copyText.value);
        alert(link)
    } 
</script>