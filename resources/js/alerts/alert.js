import { Dismiss } from 'flowbite';

// target element that will be dismissed
const $targetEl = document.getElementById('alert-border-2');

// optional trigger element
const $triggerEl = document.getElementById('triggerElement_alert');

// options object
const options = {
    transition: 'transition-opacity',
    duration: 5000,
    timing: 'ease-out',

    // callback functions
    onHide: (context, targetEl) => {
        targetEl.remove(); // Удаляем элемент из DOM
    }
};

// instance options object
const instanceOptions = {
    id: 'triggerElement_alert',
    override: true
};

const dismiss = new Dismiss($targetEl, $triggerEl, options, instanceOptions);


if($targetEl)
{
    //спрятать элемент через 5 секунд
    setTimeout(() => {
        dismiss.hide(); // Вызываем метод `hide()` для скрытия
    }, 5000);
}



