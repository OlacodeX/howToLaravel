@section('title') {{ 'My Tutorials' }} @endsection
<div class="p-4 sm:ml-64 mt-24">
    <div class="mb-4">
        {{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg"> --}}
        <div class="relative overflow-x-auto overflow-y-hidden shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 table-auto">
                <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Your tutorials
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Find below an overview of your tutorials on LaravelLab.</p>
                </caption>
                @if (session()->has('message'))
                    <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
                        {{ session('message') }}
                    </div>
                @endif
                @if (count($userTutorials) > 0) 
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                S/N
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Topic
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Banner
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tags
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Brief
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userTutorials as $index => $tutorial)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                
                                <td class="px-2 py-4 w-[60px]">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-2 py-4 w-[96px]">
                                    {{ $tutorial->created_at }}
                                </td>
                                <td class="px-2 py-4 w-[196px]">
                                    {{ $tutorial->topic }}
                                </td>
                                <td class="px-2 py-4 w-[96px]">
                                    
                                    <img class="h-12 w-24" src="{{ $tutorial->banner }}" alt="tutorial banner">
                                </td>
                                <td class="px-2 py-4">
                                    @foreach ($tutorial->tags as $tag)
                                        <span class="bg-purple-100 text-purple-800 mb-2 text-xs font-medium mr-1 px-2.5 py-0.5 rounded border border-purple-400">{{ $tag }}</span>
                                    @endforeach
                                </td>
                                <td class="px-2 py-4">
                                    {!! Str::limit($tutorial->body, 100) !!}
                                </td>
                                <td class="px-2 py-4 w-[96px]">
                                    <span class="{{ $tutorial->status->title() == "Active" ? "bg-green-100 text-green-800" : "bg-gray-100 text-gray-800" }} text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $tutorial->status->title() }}</span>
                                </td>
                                <td class="flex items-center px-6 py-4 space-x-5">
                                    <a href="/edit-tutorial/{{ $tutorial->id }}" class="font-medium" data-tooltip-target="tooltip-edit" data-tooltip-style="light">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><style>svg{fill:rgb(107 33 168)}</style><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                                        <div id="tooltip-edit" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                            Edit Tutorial
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </a>
                                    <svg data-tooltip-target="tooltip-delete" data-tooltip-style="light" data-modal-target="popup-modal-{{ $tutorial->id }}" data-modal-toggle="popup-modal-{{ $tutorial->id }}" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512"><style>svg{fill:rgb(107 33 168)}</style><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg>
                                    <div id="tooltip-delete" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                        Delete Tutorial
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    {{-- <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a> --}}
                                    
                                </td>
                                <div id="popup-modal-{{ $tutorial->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{ $tutorial->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-6 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this tutorial - <b>{{ $tutorial->topic }}</b>?</h3>
                                                <button data-modal-hide="popup-modal-{{ $tutorial->id }}" type="button" class="text-white bg-purple-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" wire:click="deleteTutorial('{{$tutorial->id}}')">
                                                    Yes, I'm sure
                                                </button>
                                                <button data-modal-hide="popup-modal-{{ $tutorial->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <div class="text-center mt-8">
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">You have not created any tutorials yet.</p>
                        <a href="/create-tutorial" class="inline-flex items-center justify-center pr-16 pl-8 py-5 text-base font-medium text-gray-500 rounded-lg bg-gray-50 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                        
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                                </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><style>svg{fill:rgb(107 33 168)}</style>
                                <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/></svg>
                            <span class="w-full pl-2 text-purple-800">Create New Tutorial</span>
                        </a> 
                    </div>
                @endif
            </table>
        </div>
        <div class="justify-end mt-4">
            {{$userTutorials->links('pagination-links')}}
        </div>
    </div>
</div>