<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Modules\User\Domain\Async\Event\SendMessagePersonalEvent;


class go extends Command
{

    protected $signature = 'go';


    public function handle()
    {
        SendMessagePersonalEvent::dispatch(1);
    }

    private function getHeight($node, &$maxDiameter) {
        if ($node === null) {
            return 0;
        }

        // Рекурсивно вычисляем высоту левого и правого поддеревьев
        $leftHeight = $this->getHeight($node->left, $maxDiameter);
        $rightHeight = $this->getHeight($node->right, $maxDiameter);

        // Диаметр через данный узел равен сумме высот левого и правого поддеревьев
        $currentDiameter = $leftHeight + $rightHeight;

        // Обновляем глобальное значение диаметра, если найден больший
        if ($currentDiameter > $maxDiameter) {
            $maxDiameter = $currentDiameter;
        }

        // Возвращаем высоту для текущего узла
        return max($leftHeight, $rightHeight) + 1;
    }

    // Функция для вычисления диаметра дерева
    private function diameterOfTree($root) {
        $maxDiameter = 0;
        $this->getHeight($root, $maxDiameter);
        return $maxDiameter;
    }
}
