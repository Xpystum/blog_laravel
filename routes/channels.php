<?php

use App\Modules\User\Domain\Models\MessagePersonal;
use App\Modules\User\Domain\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Broadcast;

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('message.{messagePersonalId}', function (User $user, int $messagePersonalId) {
    return $user->id === MessagePersonal::find($messagePersonalId)->user_id;
});
