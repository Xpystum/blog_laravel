<?php

namespace App\Modules\Email\Domain\Repositories;

use App\Modules\Base\CoreRepository;
use App\Modules\Email\App\Data\Enums\EmailStatusEnum;
use App\Modules\Email\Domain\Actions\CreateEmailAccesTokenAction;
use App\Modules\Email\Domain\Interface\Repository\IEmailAccesTokenRepository;
use App\Modules\Email\Domain\Models\EmailAccesToken as Model;

class EmailAccesTokenRepository extends CoreRepository implements IEmailAccesTokenRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function create(int $user_id, string $email_value) : ?Model
    {
        return CreateEmailAccesTokenAction::make($user_id, $email_value);
    }

    public function updateStatus(EmailStatusEnum $status) : bool
    {
        return (bool) $this->query()->update([
            'status' => $status,
        ]);
    }

    /**
     * Найти модель по массиву условий
     * @param array $array
     *
     * @return Model
     */
    public function findModelForArray(array $array) : Model
    {
        return $this->query()->where($array)->first();
    }

}
