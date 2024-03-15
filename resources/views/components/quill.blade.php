@props(['name' => ''])

<div>

    <input type="hidden" id="quillContent" name="{{$name}}">
    <div style="height: 550px;" id="editorQuill"></div>

</div>

@once
    @push('trix')
        {{-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script> --}}
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.snow.css" rel="stylesheet" />
       
    @endpush

    @push('Quill')
        <!-- Initialize Quill editor -->
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.0-rc.2/dist/quill.js"></script>
        
        <script>

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

            
            const quill = new Quill('#editorQuill', options);

            function saveDeletedContent() {

                if(!localStorage.getItem(key))
                {
                    const content = quill.getContents(); // Получение содержимого редактора в формате Delta
                    localStorage.setItem(key, JSON.stringify(content));
                    return true;
                }
                
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
                let saveContent = localStorage.getItem(key);

                if(saveContent)
                {
                    quill.setContents(JSON.parse(saveContent));
                }
                else{
                    quill.setContents({ops: []});
                }

            })();


        </script>

    @endpush
@endonce


