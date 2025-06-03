<?php

namespace App\Http\Controllers\User\Message;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\User\Domain\Models\ChatPersonal;

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

        return view('pages/user/messages/preview-message', compact('messages'));
    }
}
