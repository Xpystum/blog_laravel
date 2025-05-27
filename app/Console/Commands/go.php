<?php

namespace App\Console\Commands;

use App\Modules\Post\Domain\Models\Post;
use App\Modules\User\Domain\Models\User;
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
        $user = User::find(1);

        Post::factory()->count(50)->create(['user_id' => $user->id]);
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
