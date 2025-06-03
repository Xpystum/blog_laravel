<?php

namespace App\Modules\User\Domain\Factories;

use App\Modules\User\Domain\Models\ChatPersonal;
use App\Modules\User\Domain\Models\User;
use App\Modules\User\Domain\Models\MessagePersonal;
use Illuminate\Database\Eloquent\Factories\Factory;


class MessagePersonalFactory extends Factory
{

    protected $model = MessagePersonal::class;

    public function definition(): array
    {

        return [
            'chat_personal_id' => ChatPersonal::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'message' => fake()->text(150),
        ];
    }

}
