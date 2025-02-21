// Кнопка копирование из pre + code
function copyTextToClipboard(text) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(function () {


        }, function (err) {


        });
    } else {
        // Запасной вариант для устаревших браузеров
        var textArea = document.createElement("textarea");
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();
        try {
            document.execCommand('copy');
        } catch (err) {

        }
        document.body.removeChild(textArea);
    }
}


// Для каждого <pre> добавляем обработчик клика
var doc = document.querySelectorAll('.pre-tiptap').forEach(function (pre) {

    pre.addEventListener('click', function (e) {
        // Определяем координаты клика относительно <pre>
        var rect = pre.getBoundingClientRect();
        var offsetX = e.clientX - rect.left;
        var offsetY = e.clientY - rect.top;

        // Параметры области кнопки:
        // Предположим, что кнопка имеет ширину около 80px и высоту 30px
        var buttonWidth = 80;
        var buttonHeight = 30;

        // Если клик произошёл в правом верхнем углу, где "находится" кнопка
        if (offsetX >= rect.width - buttonWidth && offsetY <= buttonHeight) {
            // Находим содержимое кода внутри <code>
            var codeElement = pre.querySelector('code');
            if (codeElement) {
                // Используем innerText, чтобы получить текст без HTML-тегов
                var codeText = codeElement.innerText;
                copyTextToClipboard(codeText);
            }
        }
    });
});
