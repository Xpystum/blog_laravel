<?php

namespace App\Http\Controllers;



class EmailController extends Controller
{
    public function index()
    {
        return view('emails.email_index');
    }

    public function send()
    {

        // session(['email-confirmation-sent' => 'test']);

        session(['alert_success' => 'Сообщение для подтверждения email, отправлено на почту!']);

        return view('emails.email_index');
    }

    public function confirmation()
    {

    }
}
