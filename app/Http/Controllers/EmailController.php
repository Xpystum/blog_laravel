<?php

namespace App\Http\Controllers;

use App\Modules\Auth\Domain\Services\AuthService;
use App\Modules\Email\Domain\Models\EmailAccesToken;
use App\Modules\Email\Domain\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function index()
    {
        return view('emails.email_index');
    }

    public function send(
        Request $request,
        AuthService $auth,
        EmailService $emailService,
    ){
        #TODO Сделать ограничение на количество запросов от данного user
        $timer = $request->session()->get('email-confirmation-sent');

        //если время отправки ещё не прошло (небольшая защита)
        if(isset($timer) && ( $timer['carbon'] > now() ))
        {
            session(['alert_danger' => 'Дождитесь времени, что бы снова отправить сообщение на почту!']);

            return redirect()->route('email.confirmation');
        }

        { // Отправляем сообщение на почту через сервес
            $user = isAuthorized();
            $emailService->sendEmailConfirmationUser($user->id, $user->email);
        }

        { //Логика информации для view
            //логика для блокировки отправки на view странице
            session(['email-confirmation-sent' => [
                'carbon' => now()->addSeconds(15),
                'disabled' => '15',
            ]]);

            //уведомление для user
            session(['alert_success' => 'Сообщение для подтверждения email, отправлено на почту!']);
        }

        return redirect()->route('email.confirmation');

    }

    public function confirmation(EmailAccesToken $emailAccesToken)
    {
        dd($emailAccesToken);
    }
}
