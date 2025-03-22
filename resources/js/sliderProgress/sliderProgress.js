import * as noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';

var slider = document.getElementById('progres_slider_skill');



console.log('wefwe');

// noUiSlider.create(slider, {
//     start: [20, 80],
//     connect: true,
//     range: {
//         'min': 0,
//         'max': 100
//     }
// });

noUiSlider.create(slider, {
    start: 0,
    step: 20,
    behaviour: 'lower',
    tooltips: [
        // { to: function(value) { return '❤️ ' + value; } }
        {   to: function(value) {
                // Проверка: если значение больше порога - добавляем описание

                if (value == 0) {
                    return 'В процессе обучения ' + value + " %";
                }
                if (value == 20) {
                    return 'Базовые навыки Junior' + value + " %";
                }
                else if(value == 40)
                {
                    return 'Junior -> Middle ' + value + " %";
                }
                else if(value == 60)
                {
                    return 'Middle' + value + " %";
                }
                else if(value >= 80)
                {
                    return 'Профессионал ' + value + " %";
                }
                else if(value >= 100)
                {
                    return 'Профессионал ' + value + " %";
                }
            }
        }
    ],
    connect: 'lower',
    range: {
        'min': 0,
        'max': 100
    }
});


