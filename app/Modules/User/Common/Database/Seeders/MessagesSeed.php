<?php

namespace App\Modules\User\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\User\Domain\Models\User;
use App\Modules\User\Domain\Models\ChatPersonal;
use App\Modules\User\Domain\Models\MessagePersonal;

class MessagesSeed extends Seeder
{

    public function run(): void
    {

        $user = User::first();
        $userOther = $userOther = User::orderBy('id', 'desc')->first();


        /** @var ChatPersonal */
        $chatPersonal = ChatPersonal::factory()->create([
            'user1_id' => $user->id,
            'user2_id' => $userOther->id,
        ]);

        for ($i=0 ; $i < 10; $i++) {

            if($i % 2 == 0)
            {

                MessagePersonal::factory()->create([
                    'chat_personal_id' => $chatPersonal->id,
                    'user_id' => $user->id,
                ]);

            } else {

                MessagePersonal::factory()->create([
                    'chat_personal_id' => $chatPersonal->id,
                    'user_id' => $userOther->id,
                ]);

            }

        }

    }
}

