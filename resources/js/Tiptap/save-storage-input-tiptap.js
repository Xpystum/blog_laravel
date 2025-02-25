import { editor } from "./tiptap.js"; //нужно для загрузки tiptap

const defaultContent = '<p><strong>Начни писать статью, ведь великое начинается с малого...</strong></p>';
const key = 'tiptap_editor';
let editorInstance = null;

window.addEventListener("tiptap-editor-ready", (event) => {

    editorInstance = event.detail;

    startCheckLocalStorage(editorInstance, key);
});

window.addEventListener('DOMContentLoaded', function () {

    console.log('Страница загружена');
    setTiptapForLocalStorage(editorInstance);

});


function debounce(func, delay) {
    let timerId;

    return function(...args) {
        // Очищаем предыдущий таймер если он существует
        if (timerId) {
            clearTimeout(timerId);
        }
        // Устанавливаем новый таймер
        timerId = setTimeout(() => {
            func.apply(this, args);
        }, delay);
    };

}

function startCheckLocalStorage(editor, key)
{
    if (document.getElementById("wysiwyg-example")) {

        const tiptapInput = document.getElementById("wysiwyg-example");


        tiptapInput.addEventListener('input', () => {

            let value = editor.getHTML();

            compareLocalStorage(value);
        });

    }
}

function getLocalStorage(key)
{
    return localStorage.getItem(key)
}

function setLocalStorage(key, value)
{
    return localStorage.setItem(key, value);
}

function compareLocalStorage(value)
{

    let valueLocalStorage = getLocalStorage(key);

    if( (value !== defaultContent) && (value !== valueLocalStorage) )
    {
        valueLocalStorage = setLocalStorage(key, value);
        console.log('Установка в local storage');
    }

}

function setTiptapForLocalStorage(editor)
{
    const valueLocalStorage = getLocalStorage(key);

    if(valueLocalStorage !== null && valueLocalStorage !== undefined)
    {
        editor.commands.setContent(valueLocalStorage);
    }
}


