<?php

namespace App\Http\Controllers;

use App\Modules\Auth\Domain\Services\AuthService;
use App\Modules\Email\Domain\Models\EmailAccesToken;
use App\Modules\Email\Domain\Services\EmailService;
use App\Modules\User\Domain\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function index()
    {

        /**
        * @var User
        */
        $user = isAuthorized();

        if($user->email_verified_at) {
            return redirect()->back()->with(['alert_danger' => 'Email пользователя - уже был подтверждён!']);
        }

        return view('emails.email_index');
    }

    public function send(
        Request $request,
        EmailService $emailService,
    ){
        #TODO Сделать ограничение на количество запросов от данного user
        $timer = $request->session()->get('email-confirmation-sent');

        //если время отправки ещё не прошло (небольшая защита)
        if(isset($timer) && ( $timer['carbon'] > now() ))
        {
            return redirect()->route('email.confirmation')->with(['alert_danger' => 'Дождитесь времени, что бы снова отправить сообщение на почту!']);
        }

        { // Отправляем сообщение на почту через сервес

            /**
            * @var User
            */
            $user = isAuthorized();

            if($user->email_verified_at) {
                return redirect()->route('email.confirmation')->with(['alert_danger' => 'Email пользователя - уже был подтверждён!']);
            }

            $emailService->sendEmailConfirmationUser($user->id, $user->email);
        }

        { //Логика информации для view
            //логика для блокировки отправки на view странице
            session(['email-confirmation-sent' => [
                'carbon' => now()->addSeconds(15),
                'disabled' => '15',
            ]]);

            //уведомление для user
        }

        return redirect()->route('email.confirmation')->with(['alert_success' => 'Сообщение для подтверждения email, отправлено на почту!']);

    }

    public function confirmation(EmailAccesToken $emailAccesToken)
    {
        dd($emailAccesToken);
    }
}
