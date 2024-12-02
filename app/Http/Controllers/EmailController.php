<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        return view('emails.email_index');
    }

    public function send(Request $request)
    {
        #TODO Сделать ограничение на количество запросов от данного user
        $timer = $request->session()->get('email-confirmation-sent');

        //если время отправки ещё не прошло (небольшая защита)
        if(isset($timer) && ( $timer['carbon'] > now() ))
        {
            session(['alert_danger' => 'Дождитесь времени, что бы снова отправить сообщение на почту!']);

            return redirect()->route('email.confirmation');
        }

        //логика отправки сообщение
        session(['email-confirmation-sent' => [
            'carbon' => now()->addSeconds(15),
            'disabled' => '15',
        ]]);

        session(['alert_success' => 'Сообщение для подтверждения email, отправлено на почту!']);
        return redirect()->route('email.confirmation');

    }

    public function confirmation()
    {

    }
}
