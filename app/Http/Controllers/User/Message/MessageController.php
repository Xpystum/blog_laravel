<?php

namespace App\Http\Controllers\User\Message;

use App\Http\Controllers\Controller;


class MessageController extends Controller
{
    public function index()
    {
        return view('pages/user/messages/preview-messages');
    }
}
