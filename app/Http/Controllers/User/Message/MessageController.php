<?php

namespace App\Http\Controllers\User\Message;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\User\Domain\Models\ChatPersonal;
use App\Modules\User\Domain\Models\User;

class MessageController extends Controller
{
    /**
     * Список всех чатов с пользователями
     */
    public function chats()
    {
        $chatPersonals = ChatPersonal::where('user1_id', Auth::user()->id)->orWhere('user2_id', Auth::user()->id)->get();


        $chatPersonals = $chatPersonals->load('userOne', 'userTwo', 'lastMessage');


        return view('pages/user/messages/preview-messages', compact('chatPersonals') );
    }

    /**
     * Получаем все сообщение у чата
     */
    public function private(ChatPersonal $chatPersonal)
    {

        $messages = $chatPersonal->messagePersonal;

        /**
         * Авторзиированный пользователь
         * @var User
        */
        $userAuth = Auth::user();

        /**
         * Профиль Пользователь с кем ведётся чат
         * @var Profile
        */
        $profileOther = ($chatPersonal->user1_id === $userAuth->id) ? $chatPersonal->userOne->user : $chatPersonal->userTwo->user;

        /**
         * Пользователь с кем ведётся чат
         * @var User
        */
        $userOther = $profileOther->load('profile');

        return view('pages/user/messages/preview-message', compact('messages', 'userAuth', 'userOther'));
    }
}
