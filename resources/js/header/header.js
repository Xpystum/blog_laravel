

function startInicilization()
{
    if(!savedMenu) {
        savedMenu = document.querySelector('[data-collapse-navmenu="menu"]');
    }
}

function updateMenu(mediaQuery) {

    console.log(menuBurger);

    if (mediaQuery.matches) {

        console.log('Ширина меньше 1024');
        // Если ширина 1024 пикселя или меньше и меню еще не сохранено

        if (savedMenu && navdiv) {
            navdiv.removeChild(savedMenu)
        }

    } else {

        console.log('Ширина больше 1024');

        // Если ширина больше 1024 пикселей и меню было сохранено
        if (savedMenu) {
            // Добавляем меню обратно в DOM
            navdiv.insertBefore(savedMenu, document.querySelector('[data-collapse-navmenu="buttonBurger"]'));
        }

    }
}


let savedMenu = null;
let navdiv = document.querySelector('[data-collapse-navmenu="div-menu"]')
let menuBurger = document.querySelector('[data-collapse-navmenu="buttonBurger"]')
const breakpoint = 1023;
const mediaQuery = window.matchMedia(`(max-width: ${breakpoint}px)`);

startInicilization();
let startInitUpdateMenu = updateMenu(mediaQuery);

// Отслеживание изменений размера окна
mediaQuery.addEventListener('change', startInitUpdateMenu);







