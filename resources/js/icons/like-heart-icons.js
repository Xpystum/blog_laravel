

document.getElementById('like-button').addEventListener('click', function() {
    const heartIcon = this.querySelector('.svg-icon-heart');

    // Добавляем активный класс для изменения цвета
    heartIcon.classList.toggle('custom-icon-blade-heart-active');

    // Добавляем класс для анимации увеличения
    heartIcon.classList.add('animate-pulse');

    // Убираем класс через небольшую задержку для эффекта "пульсации"
    setTimeout(() => {
        heartIcon.classList.remove('animate-pulse');
    }, 100); // Тот же промежуток времени, как указано в transition
});
