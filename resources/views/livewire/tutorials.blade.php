
{{-- @if ($loading)
    @livewire('tutorial-skeleton')
    <h1>loaadi</h1>
@endif --}}
<div class="mt-2">
    @if (count($tutorials) > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 mt-2">
            @foreach ($tutorials as $tutorial)
                <a href="/tutorials/{{ $tutorial->slug }}" class="scale-100 p-6 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    
                    <div>
                        {{-- <div class="dark:bg-red-800/20 flex items-center justify-center w-full rounded-full pb-4">
                            <img src="{{ $tutorial->banner }}" alt="" class="w-full">
                        </div> --}}

                        <h2 class="mt-6 text-xl font-semibold text-gray-900">{{ $tutorial->topic }}</h2>

                        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                            {!! Str::limit($tutorial->body, 200) !!}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="text-center">
            <h3 class="text-6xl font-black pt-8 pb-4">No Tutorials Yet</h3>
        </div>
    @endif
</div>
@livewire('footer')
{{-- 
<script>
    Livewire.on('ticketTutorial', tutorial => {
        alert('A post was added with the id of: ' + tutorial);
    })
</script> --}}