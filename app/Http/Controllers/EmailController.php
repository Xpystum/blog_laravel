<?php

namespace App\Http\Controllers;

use App\Modules\Base\Response\FunctionResult;
use App\Modules\Email\Domain\Models\EmailAccesToken;
use App\Modules\Email\Domain\Services\EmailService;
use App\Modules\User\Domain\Models\User;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        /**
        * @var User
        */
        $user = isAuthorized();

        //TODO Вынести в middleware
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

    public function confirm(
        EmailAccesToken $emailAccesToken,
        EmailService $emailService,
    ) {

        /**
        * @var FunctionResult
        */
        $status = $emailService->confirmEmailRegistration($emailAccesToken);

        $alert = $status->success ? ['alert_success' => $status->returnValue]  : ['alert_danger' => $status->errorMessage];

        return redirect()->intended($default = '/')->with($alert);
    }
}
