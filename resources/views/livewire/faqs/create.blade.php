<div class="text-center" x-data="{ title_focused: @entangle('title_focused')}">
    <form wire:submit.prevent="submit">
        <div lass="mb-4">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="question">
                Question
            </label>
            <input type="text" id="question" wire:model="question" class="border-gray-300 rounded-md shadow-sm">
            @error('question') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div wire:ignore class="mb-4">
            <textarea id="answer" wire:model='answer' name="answer" class="min-h-fit h-48">
            </textarea>
        </div>
        <button type="submit">Save FAQ</button>
    </form>
</div>

@push('scripts')
    <script src="{{ asset("/tinymce/tinymce.min.js") }}" referrerpolicy="origin"></script>
    <script>
        const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

        tinymce.init({
            selector: 'textarea#answer',
            plugins: 'preview importcss searchreplace autolink directionality code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            editimage_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            toolbar_sticky_offset: isSmallScreen ? 102 : 108,
            image_advtab: true,
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image table',
            skin: useDarkMode ? 'oxide-dark' : 'oxide',
            content_css: useDarkMode ? 'dark' : 'default',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
            promotion: false,
            images_upload_url: '/upload',
            file_picker_types: 'image',
            relative_urls: false,
            remove_script_host: false,
            convert_urls: true,
            file_picker_callback: function (cb, value, meta){
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function(){
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function(){
                        var id = 'blobid'+(new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {title:file.name});
                    };
                };
                input.click();
            },
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('change', function (e) {
                    @this.set('answer', editor.getContent());
                });
            }
        });
    </script>
@endpush
