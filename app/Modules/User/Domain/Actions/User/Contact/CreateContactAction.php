<?php

namespace App\Modules\User\Domain\Actions\User\Contact;

use Exception;
use App\Modules\Post\Domain\Models\Contact;
use App\Modules\User\App\Data\ValueObject\ContactVO;

class CreateContactAction
{

    /**
     * @param ContactVO $dto
     *
     * @return Contact
     */
    public static function make(ContactVO $dto) : Contact
    {
        return (new self)->run($dto);
    }

    /**
     * @param ContactVO $data
     *
     * @return Contact
     */
    public static function run(ContactVO $data) : Contact
    {
        try {

            $model = Contact::query()->create($data->toArrayNotNull());

            return $model;

        } catch (\Throwable $th) {

            logError($th, [$data]);
            throw new Exception('Ошибка при создании User в CreateUserAction.', 500);

        }
    }

}
