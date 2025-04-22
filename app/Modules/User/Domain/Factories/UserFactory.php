<?php

namespace App\Modules\User\Domain\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Modules\User\Domain\Models\User;
use App\Modules\User\App\Data\Enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;


class UserFactory extends Factory
{

    protected static ?string $password;

    protected $model = User::class;


    public function definition(): array
    {
        return [
            'login' => $this->faker->randomElement(UserTypeEnum::class),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
