<?php

namespace App\Modules\User\Domain\Interactor\User;

use App\Modules\Email\Domain\Services\EmailService;
use App\Modules\User\App\Data\DTO\User\UserCreateDTO;
use App\Modules\User\Domain\Actions\User\CreateUserAction;
use App\Modules\User\Domain\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserRegistrationInteractor
{

    public function __construct(
        private EmailService $emailService,
    ) { }


    /**
     * @param UserCreateDTO $dto
     *
     * @return User
     */
    public function execute(UserCreateDTO $dto) : User
    {
        return $this->run($dto);
    }

    private function run(UserCreateDTO $dto) : User
    {

        #TODO Использовать паттерн handler
        try {

            $user = DB::transaction(function () use ($dto) {

                /**
                * @var User
                */
                $user = $this->createUser($dto);

                //отправляем подтвреждения на почту через очередь
                // $this->emailService->sendEmailConfirmationUser($user->id, $user->email); #TODO временно убрали отправку подвтреждения


                return $user;
            });


        } catch (\Throwable $th) {

            logError($th);
            throw new Exception('Ошибка в UserRegistrationInteractor.' , 500);

        }

        return $user;
    }

    private function createUser(UserCreateDTO $dto) : User
    {
        return CreateUserAction::make($dto);
    }

}
