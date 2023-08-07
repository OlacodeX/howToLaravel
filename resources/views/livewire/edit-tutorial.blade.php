@section('title') {{ 'Edit Tutorial' }} @endsection
<x-tutorial-form-card>
    <tutorial-form-card-heading>
       <h3 class="lg:text-6xl md:text-4xl sm:text-4xl font-black sm:pt-4 lg:pt-8 md:pt-8 pb-4">
          Edit Tutorial
       </h3>
    <tutorial-form-card-heading />
    <form wire:submit.prevent="updateTutorial">
        <div>
            <x-input class="mt-1 w-full bg-gray-50 rounded-none py-4 border-none shadow text-gray-900 text-sm" type="text" wire:model.lazy="topic" placeholder="Tutorial topic" />
            @error('topic') <span class="text-red-500 text-xs justify-start flex">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
                <x-input id="tags" class="mt-1 w-full bg-gray-50 rounded-none py-4 border-none shadow text-gray-900 text-sm" type="text" wire:model="tagString" placeholder="Tutorial tags" wire:change="handleTags"/>
                @error('tagString') <span class="text-red-500 text-xs justify-start flex">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4" wire:ignore >
            <textarea id="body" wire:model.defer="body" name="body" class="block mt-1 w-full bg-gray-50 rounded-none border-none shadow text-gray-900 text-sm"></textarea>
            @error('body') <span class="text-red-500 text-xs justify-start flex">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            @if ($uploadedImage)
                <img class="h-auto max-w-full py-4" src="{{ $uploadedImage->temporaryUrl() }}" alt="Tutorial banner">
            @else
                <img class="h-auto max-w-full py-4" src="{{ $image }}" alt="Tutorial banner">
            @endif

            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input class="hidden" type="file" id="dropzone-file" wire:model="uploadedImage"/>
                </label>
            </div> 
            @error('image') <span class="text-red-500 text-xs justify-start flex">{{ $message }}</span> @enderror
        </div>
        <div class="flex items-center justify-end mt-4">
        
            <div wire:loading>
                <button class="disabled ml-4 px-12 py-4 text-xs inline-flex items-center bg-purple-800 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest transition ease-in-out duration-150 opacity-50 cursor-not-allowed">
                    Preparing Data....
                </button>
            </div>
            <div wire:loading.remove>
                <x-button class="ml-4 px-12 py-4 text-2xl">
                    Update Tutorial
                </x-button>
            </div>
        </div>
    </form>
</x-tutorial-form-card>
@push('scripts')

    <script>
        const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;
        tinymce.init({
        selector: 'textarea#body',
        plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
        editimage_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: false,
        // toolbar_sticky_offset: isSmallScreen ? 102 : 108,
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        image_class_list: [
            {title: 'img-responsive', value: 'img-responsive'},
        ],
        importcss_append: true,
        file_picker_callback: (callback, value, meta) => {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
            };
            input.click();
        },
        templates: [
            { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
            { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
            { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
        ],
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
                @this.set('body', editor.getContent());
            });
        },
        images_upload_url: '/tinymce/upload',
        file_picker_types: 'image',
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 600,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image table',
        skin: useDarkMode ? 'oxide-dark' : 'oxide',
        content_css: useDarkMode ? 'dark' : 'default',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
        codesample_dialog_height: 400,
        codesample_dialog_width: 600,
        codesample_content_css: "http://ourcodeworld.com/material/css/prism.css",
        });
    </script>
@endpush

    