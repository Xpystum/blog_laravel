<?php

namespace App\Modules\User\Domain\Factories;

use App\Modules\User\Domain\Models\User;
use App\Modules\User\Domain\Models\ChatPersonal;
use Illuminate\Database\Eloquent\Factories\Factory;


class ChatPersonalFactory extends Factory
{

    protected $model = ChatPersonal::class;

    public function definition(): array
    {

        $users = User::inRandomOrder()->take(2)->get();

        return [
            'user1_id' =>  $users[0]->id,
            'user2_id' => $users[1]->id,
        ];
    }

}
