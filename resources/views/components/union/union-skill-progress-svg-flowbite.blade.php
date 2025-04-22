@props(['class_name' => ' progres_slider ', 'class_value_progress_bar' => '', 'value_skill' => 0])


@php
    $skillLevels = [
        0   => ['title' => '📚 В процессе обучения', 'progress' => '0%'],
        25  => ['title' => '🌱 Базовые навыки',   'progress' => '25%'],
        50  => ['title' => '🧠 Продвинутый уровень', 'progress' => '50%'],
        75  => ['title' => '💎 Эксперт',   'progress' => '75%'],
        100 => ['title' => '💼 Профессионал ', 'progress' => '100%'],
    ];

    $currentSkill = $skillLevels[$value_skill] ?? ['title' => '❔ Неизвестный уровень', 'progress' => '0%'];
@endphp

<div class="flex flex-row w-[80%] items-center">
    {{ $slot }}

    <div class="flex-1 ml-2">
        <span class="mb-1 block text-[#A8C8EE] text-lg">{{ $currentSkill['title'] }}</span>
        <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: {{ $currentSkill['progress'] }}">
                {{ $currentSkill['progress'] }}
            </div>
        </div>
    </div>
</div>





