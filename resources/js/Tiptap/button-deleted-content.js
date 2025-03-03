import { getLocalStorage } from "./save-storage-input-tiptap.js"; //нужно для загрузки tiptap
import { key } from "./save-storage-input-tiptap.js"; //нужно для загрузки tiptap

const myButton = document.getElementById("popup-modal-remove-content-tiptap");

if(myButton)
{
    myButton.addEventListener("click", function () {

        if(getLocalStorage(key)){
            localStorage.removeItem(key);
        }

        console.log('Кнопка нажата');
    });
}
