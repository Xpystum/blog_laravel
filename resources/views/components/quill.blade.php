@props(['name' => ''])

<div>

    <input type="hidden" id="quillContent" name="{{$name}}">
    <div style="height: 550px;" id="editorQuill"></div>

</div>

@once
    @push('trix')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.snow.css" rel="stylesheet" />
    @endpush

    @push('jsAfter')
        <!-- Initialize Quill editor -->
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.js"></script>

        {{-- скрипт для сжатие контента в local storage --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lz-string/1.4.4/lz-string.min.js"></script>

        <script>
            //  #TODO Убрать в отдельный файл JS
            const key = 'quillContent';

            const toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['blockquote', 'code-block'],
                [{ 'align': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript

                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

                [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
                [{ 'font': [] }],


                ['image'],
                ['video'],
                ['link'],
                ['clean'],    // remove formatting button
            ];

            const options = {

                placeholder: 'Начните наполнять пост...',
                modules: {
                    toolbar: toolbarOptions,
                },
                theme: 'snow'

            };

            //  #TODO Сохранять не больше 5 мб в local_storage от редактора.

            const quill = new Quill('#editorQuill', options);

            function saveDeletedContent() {

                const content = quill.getContents(); // Получение содержимого редактора в формате Delta
                const json = JSON.stringify(content);

                const compressed = LZString.compressToUTF16(json);

                localStorage.setItem(key, compressed);
                return true;

            }

            function submitFormQuill() {
                // Получение HTML-содержимого Quill редактора
                var quillHtml = quill.root.innerHTML;

                // Запись содержимого редактора в скрытое поле формы
                document.getElementById('quillContent').value = quillHtml;

                saveDeletedContent();


                // Отправка формы
                document.querySelector('form').submit();
            }

            (function setContainerQuill(){

                let compressed = localStorage.getItem(key);
                const decompressed = LZString.decompressFromUTF16(compressed);

                if(compressed)
                {
                    quill.setContents(JSON.parse(decompressed));
                }
                else{
                    quill.setContents({ops: []});
                }

            })();


        </script>

    @endpush
@endonce


