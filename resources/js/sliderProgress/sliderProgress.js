import * as noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';


document.addEventListener('DOMContentLoaded', () => {


    let sliders = document.querySelectorAll('.progres_slider_skill');
    let el = document.getElementById('progres-skill-bar-component-livewire');
    let generatedId = el.getAttribute('wire:id');

    // Используем полученный id для поиска экземпляра компонента Livewire
    let component = Livewire.find(generatedId);



    sliders.forEach(function (slider) {

        let input = slider.querySelector("input");

        // Инициализируем noUiSlider для текущего элемента
        noUiSlider.create(slider, {
            start: 0,
            step: 25,
            behaviour: 'lower',
            tooltips: [
                // { to: function(value) { return '❤️ ' + value; } }
                {
                    to: function (value) {
                        // Проверка: если значение больше порога - добавляем описание

                        if (value == 0) {
                            return '📚 В процессе обучения ' + value + " %";
                        }
                        if (value == 25) {
                            return '🌱 Базовые навыки ' + value + " %";
                        }
                        else if (value == 50) {
                            return '🧠 Продвинутый ' + value + " %";
                        }
                        else if (value == 75) {
                            return '💎 Знаток ' + value + " %";
                        }
                        else if (value == 100) {
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
                mode: 'count',
                values: [1, 2],
                // values: [1],
                density: 25
            },
        });


        // Пример: обработчик события update для вывода текущего значения каждого слайдера
        slider.noUiSlider.on('update', function (values, handle) {

            if (input) {
                input.value = values[handle];

                console.log(values, handle, input);

                component.call('updateProgress', "прикол");
            }

        });

    });

});







