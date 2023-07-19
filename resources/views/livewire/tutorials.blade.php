
<div class="mt-2">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 mt-2">
        @foreach ($tutorials as $tutorial)
            <a href="/tutorials/{{ $tutorial->slug }}" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                
                <div>
                    {{-- @livewire('show-tutorial', ['tutorial' => $tutorial]) --}}
                    <div class="dark:bg-red-800/20 flex items-center justify-center w-full rounded-full pb-4">
                        <img src="{{ $tutorial->banner }}" alt="" class="w-full">
                    </div>

                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ $tutorial->topic }}</h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                        {{ Str::limit($tutorial->body, 200) }}
                    </p>
                    {{-- <a href="/show-tutorial/{{ $tutorial->slug }}"> --}}
                        {{-- ksdjsdjsdd --}}
                        {{-- <button wire:click="tutorialSelected({{$tutorial->id}})">ksdjsdjsdd</button> --}}
                    {{-- </a> --}}
                </div>
            </a>
        @endforeach
    </div>
</div>
{{-- 
<script>
    Livewire.on('ticketTutorial', tutorial => {
        alert('A post was added with the id of: ' + tutorial);
    })
</script> --}}