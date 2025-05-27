<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}


class go extends Command
{

    protected $signature = 'go';


    public function handle()
    {
        $root = new TreeNode(
                1,
                new TreeNode(
                    2,
                    new TreeNode(4),
                    new TreeNode(5)
                ),
                new TreeNode(3)
            );

        $this->diameterOfTree($root);
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
