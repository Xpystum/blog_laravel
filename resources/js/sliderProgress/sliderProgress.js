import * as noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';

var slider = document.getElementById('progres_slider_skill');





noUiSlider.create(slider, {
    start: 0,
    step: 25,
    behaviour: 'lower',
    tooltips: [
        // { to: function(value) { return '❤️ ' + value; } }
        {   to: function(value) {
                // Проверка: если значение больше порога - добавляем описание

                if (value == 0) {
                    return '📚 В процессе обучения ' + value + " %";
                }
                if (value == 25) {
                    return '🌱 Базовые навыки ' + value + " %";
                }
                else if(value == 50)
                {
                    return '💡 Продвинутый ' + value + " %";
                }
                else if(value == 75)
                {
                    return '💎 Знаток ' + value + " %";
                }
                else if(value == 100)
                {
                    return '💼 Профессионал ' + value + " %";
                }

            }
        }
    ],
    connect: 'lower',
    range: {
        'min': 0,
        'max': 100
    },
    pips: {
        mode: 'values',
        values: [0, 25, 50, 75, 100],
        density: 25
    }
});


