<?php

namespace App\Http\Controllers\User\Message;

use App\Http\Controllers\Controller;


class MessageController extends Controller
{
    /**
     * Список всех чатов с пользователями
     * @return [type]
     */
    public function chats()
    {
        return view('pages/user/messages/preview-messages');
    }

    /**
     * @return [type]
     */
    public function message()
    {
        return view('pages/user/messages/preview-messages');
    }
}
