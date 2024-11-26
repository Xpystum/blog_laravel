import { Dismiss } from 'flowbite';

// target element that will be dismissed
const $targetEl = document.getElementById('alert-border-2');

// optional trigger element
const $triggerEl = document.getElementById('triggerElement_alert');

console.log(`${$targetEl}`, `${$triggerEl}`, '1234');

// options object
const options = {
    transition: 'transition-opacity',
    duration: 5000,
    timing: 'ease-out',

    // callback functions
    onHide: (context, targetEl) => {
        console.log('Элемент был закрыт!')
        targetEl.remove(); // Удаляем элемент из DOM
    }
};

// instance options object
const instanceOptions = {
    id: 'triggerElement_alert',
    override: true
};

const dismiss = new Dismiss($targetEl, $triggerEl, options, instanceOptions);

// hide the target element

setTimeout(() => {
    dismiss.hide(); // Вызываем метод `hide()` для скрытия
}, 5000);


