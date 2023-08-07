<style>
    p{
        font-size:18px; 
        line-height: 28px
    }
</style>
@section('title') {{$tutorial->topic}} @endsection
@section('meta_keywords') {{ implode(', ',$tutorial->tags) }}@endsection
@section('meta_description') {!! Str::limit($tutorial->body, 200) !!}@endsection
<div class="hero-section absolute left-0 right-0 bg-cover h-80" style="background-image: url({{ $tutorial->banner }}); box-shadow: 0px 0px 0px 0px #00000040,inset 0 0 0 1000px rgba(0,0,0,.5)">
    <div class="pt-40 pb-10 items-start container mx-auto">
        <h1 class="text-white leading-4 text-2xl font-extrabold">{{ $tutorial->topic }}</h1>
        <p class="text-white pt-4">
            @foreach ($tutorial->tags as $tag)
                <span class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded border border-purple-400">{{ $tag }}</span>
            @endforeach
        </p>
    </div>
</div>
<div class="content relative top-60 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 container mx-auto left-0 right-0 pb-16">

    <main class="px-8 py-4">
        <div class="flex justify-between text-purple-800">
            <p>By <span class="pr-2">{{ $tutorial->author->name }}</span> {{ $tutorial->created_at }}</p>
            <p class="flex justify-between">
                <a class="pr-4" href=""><img src="/image/icons/facebook.svg" alt=""></a>
                <a class="pr-4" href=""><img src="/image/icons/twitter.svg" alt=""></a>
                <a class="pr-4" href=""><img src="/image/icons/linkedin.svg" alt=""></a>
                <button class="pr-4" id="link" onclick="copyToClipboard('{{ config('services.helpers.base_path').'/'.'tutorials/'.$tutorial->slug }}')"><img src="/image/icons/share.svg" alt=""></button>
            </p>
        </div>
        <article class="pt-6">
            <p class="">
                {!! $tutorial->body !!}
            </p>
        </article>
        <div class="inline-flex items-center justify-center w-full">
            <hr class="w-[100rem] h-1 my-8 bg-gray-200 border-0 rounded">
            <div class="absolute px-4 -translate-x-1/2 bg-white left-1/2">
                <svg class="w-4 h-4 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                    <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
                </svg>
            </div>
        </div>
        <div class="items-center">
            <div class="pt-8 text-center">
                <img class="w-30 h-30 p-1 rounded-full ring-2 ring-purple-500 dark:ring-purple-800 mx-auto mb-4" src="{{ $tutorial->author->profile_photo_url }}" alt="Bordered avatar">
                <p class="flex justify-center">
                    @if ($tutorial->author->socials) 
                        @if (array_key_exists('Twitter', $tutorial->author->socials))
                            <a class="pr-4" href="https://twitter.com/{{ $tutorial->author->socials['Twitter'] }}" target="blank"><img src="/image/icons/twitter.svg" alt=""></a>
                        @endif
                        @if (array_key_exists('LinkedIn', $tutorial->author->socials))
                            <a class="pr-4" href="https://www.linkedin.com/{{ $tutorial->author->socials['LinkedIn'] }}" target="blank"><img src="/image/icons/linkedin.svg" alt=""></a>
                        @endif
                        @if (array_key_exists('Github', $tutorial->author->socials))
                            <a class="pr-4" href="https://github.com/{{ $tutorial->author->socials['Github'] }}" target="blank"><img src="/image/icons/github.svg" alt=""></a>
                        @endif
                    @endif
                </p>
                {{-- {{ $tutorial->author }} --}}
                <h3 class="text-2xl font-black mt-4">{{ $tutorial->author->name }}</h3>
                <h6 class="text-xl font-bold pt-2">{!! $tutorial->author->pro_title !!}</h6>
                <p class="px-8 py-4">{{ $tutorial->author->pro_brief }}</p>
            </div>
        </div>
    </main>
 
</div>
<script>
    const copyToClipboard = (link) => {
        const content = document.getElementById('link').textContent;
        navigator.clipboard.writeText(link);
        // navigator.clipboard.writeText(copyText.value);
        alert(link)
    } 
</script>