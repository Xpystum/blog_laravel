<?php

namespace App\Modules\Email\Domain\Services;

use App\Modules\Base\Errors\BusinessException;
use App\Modules\Email\App\Data\Enums\EmailStatusEnum;
use App\Modules\Email\Domain\Actions\CreateEmailAccesTokenAction;
use App\Modules\Email\Domain\Async\Events\SendEmailVerifEvent;
use App\Modules\Email\Domain\Models\EmailAccesToken;
use App\Modules\Email\Domain\Repositories\EmailAccesTokenRepository;
use App\Modules\User\Domain\Models\User;
use Exception;
use FunctionResult;
use Illuminate\Support\Facades\DB;

class EmailService
{

    public function __construct(
        private EmailAccesTokenRepository $repEmail,
    ) { }

    /**
     * Отправить уведомление на почту для подтверждения user
     * @return bool
     */
    public function sendEmailConfirmationUser(int $user_id, string $email_value) : bool
    {
        /**
        * @var EmailAccesToken
        */
        $emailAccesToken = CreateEmailAccesTokenAction::make($user_id, $email_value);

        if(is_null($emailAccesToken)) { return false; }

        //отправляем логику работы отправки в событие
        SendEmailVerifEvent::dispatch($user_id);

        return true;
    }

    /**
     * Подтвердить почту при регистрации
     * @param EmailAccesToken $data
     * @return FunctionResult
     */
    public function confirmEmailRegistration(EmailAccesToken $token) : FunctionResult
    {
        /**
        * @var User
        */
        $user = $token->user;

        $emailAcces = EmailAccesToken::where( 'user_id', $user->id )->latest()->first();

        //провереям акутальность ссылки
        if($emailAcces->id !== $token->id) { return FunctionResult::error("Данная ссылка для подтверждения уже не актуальна."); }

        //проверяем актуальное время для подтверждения почты
        if($emailAcces->expires_at < $token->expires_at) {

            $token->status = EmailStatusEnum::expired;
            $token->save();

            return FunctionResult::error("Время подтверждения данной ссылки истекло.");
        }

        try {

            #TODO Обязательна ли тут транзакция?
            DB::transaction(function () use ($user, $token) {

                $user->email_verified_at = now();
                $user->save();

                $token->status = EmailStatusEnum::completed;
                $token->save();

            });

            return FunctionResult::success('Почта успешно подтверждена.');

        } catch (\Exception $e) {

           logError($e , ['Ошибка в сервисе EmailService в методе confirmEmailRegistration']);
            throw new \Exception('Произошла ошибка при подтверждении почты.', 500, $e);
        }

    }
}

