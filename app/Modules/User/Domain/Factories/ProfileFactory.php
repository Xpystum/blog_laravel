<?php

namespace App\Modules\User\Domain\Factories;

use App\Modules\User\Domain\Models\User;
use App\Modules\User\Domain\Models\Profile;
use App\Modules\User\App\Data\Enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProfileFactory extends Factory
{

    protected $model = Profile::class;

    public function definition(): array
    {
        return [
            'full_name' => $this->faker->randomElement(UserTypeEnum::class),
            'url_avatar' => fake()->unique()->safeEmail(),
            'type' => $this->faker->randomElement(UserTypeEnum::class),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }

}
