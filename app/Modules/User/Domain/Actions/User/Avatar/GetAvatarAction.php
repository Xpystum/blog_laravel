<?php

namespace App\Modules\User\Domain\Actions\User\Avatar;

use App\Modules\Base\Errors\ActionException;
use App\Modules\User\Domain\Models\User;
use Exception;
use Illuminate\Support\Facades\Storage;

class GetAvatarAction
{

    public static function make() : string
    {
        return (new self())->run();
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function run() : string
    {
        return $this->getUrlAvatar();
    }

    /**
     * Получаем url случайного аватара из storage
     * @return string
     */
    private function getUrlAvatar() : string
    {
        $files = Storage::disk('avatars')->files();

        if (!empty($files)) {

            $randomFile = $files[array_rand($files)]; // Случайный файл

            $absolutePath = Storage::disk('avatars')->path($randomFile);

            // Убираем корневую часть пути, полученную из `public_path()`
            $relativePath = str_replace(public_path() . '\\', '', $absolutePath);

            return $relativePath;

        } else {

            logError('Ошибка при установке в GetAvatarAction (Storage Аватара был пустой) ');
            throw new ActionException('Ошибка при возврате avatar в GetAvatarAction' , 500);

        }

    }
}
