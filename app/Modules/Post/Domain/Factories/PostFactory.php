<?php

namespace App\Modules\Post\Domain\Factories;

use App\Modules\Post\Domain\Models\Post;
use App\Modules\Post\App\Data\ValueObject\PostVO;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    protected $model = Post::class;

    public function definition(): array
    {
        $postVO = PostVO::make(
            title: $this->faker->sentence, // Генерация случайного заголовка
            content: $this->faker->paragraphs(3, true), // Генерация текста из 3 параграфов
            content_cover: $this->faker->imageUrl(640, 480, 'nature'), // Генерация URL изображения
            post_img_cover_id: null, // Случайное число для ID изображения
            user_id: $this->faker->numberBetween(1, 10), // Случайное число для ID пользователя
        );

        return $postVO->toArrayNotNull();
    }

}
