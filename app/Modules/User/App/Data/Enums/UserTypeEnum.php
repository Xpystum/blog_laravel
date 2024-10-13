<?php

namespace App\Modules\User\App\Data\Enums;

enum UserTypeEnum : string
{
   case designer = "Дизайнер";

   case developer = "Разработчик";

   public static function stringToEnum(string $type)
   {
        return match ($type) {
            "Дизайнер" => UserTypeEnum::designer,
            "Разработчик" => UserTypeEnum::developer,
        };
   }

}
