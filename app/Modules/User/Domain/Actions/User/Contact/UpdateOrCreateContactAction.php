<?php

namespace App\Modules\User\Domain\Actions\User\Contact;

use Exception;

use App\Modules\User\App\Data\ValueObject\ContactVO;
use App\Modules\User\Domain\Models\Contact;

class UpdateOrCreateContactAction
{


    public static function make(ContactVO $vo, int $profile_id) : Contact
    {
        return (new self)->run($vo, $profile_id);
    }


    public static function run(ContactVO $vo, int $profile_id) : Contact
    {

        try {

            $model = Contact::updateOrCreate(
                ['name' => $vo->name],
                $vo->toArrayNotNull(),
            );

            return $model;

        } catch (\Throwable $th) {

            $nameClass = self::class;

            logError("Ошибка в {$nameClass} при создании записи: " . $th);
            throw new Exception('Ошибка в классе: ' . $nameClass, 500);

        }

        return $model;
    }

}
