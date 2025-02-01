<?php

namespace App\Modules\Post\Domain\Factories;

use App\Modules\Post\Domain\Models\Post;
use App\Modules\User\Domain\Models\User;
use App\Modules\Post\Domain\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'post_id' => Post::factory(),
            'user_id' => User::factory(),
            'value' => $this->faker->sentence(),
        ];
    }

}
