const burgerButton = document.getElementById('burger_menu_header');
const burgerMenu = document.getElementById('navbar-sticky-customer-burgger');
const navList = document.getElementById('nav-list');
const mobileNavList = document.getElementById('mobile-nav-list');

// Функция для перемещения элементов в бургер-меню
function moveNavItems() {

    if (window.innerWidth < 1024) { // 1024 пикселя соответствует lg
        while (navList.firstChild) {
            mobileNavList.appendChild(navList.firstChild);
        }
        burgerMenu.classList.remove('hidden');
    } else {
        while (mobileNavList.firstChild) {
            navList.appendChild(mobileNavList.firstChild);
        }
        burgerMenu.classList.add('hidden');
    }
    
}

// Перемещает элементы при загрузке и изменении размера окна
moveNavItems();
window.addEventListener('resize', moveNavItems);

// Обработчик для отображения или скрытия бургер-меню
burgerButton.addEventListener('click', () => {
    burgerMenu.classList.toggle('hidden');
});
