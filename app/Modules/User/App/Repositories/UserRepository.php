<?php

namespace App\Modules\User\App\Repositories;

use App\Modules\Base\CoreRepository;
use App\Modules\User\App\Data\DTO\User\UserCreateDTO;
use App\Modules\User\Domain\Actions\User\CreateUserAction;
use App\Modules\User\Domain\IRepository\IUserRepository;
use App\Modules\User\Domain\Models\User as Model;

class UserRepository extends CoreRepository implements IUserRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param UserCreateDTO $data
     *
     * @return Model
     */
    public function create($data) : ?Model
    {
        return CreateUserAction::run($data);
    }

    public function find($id)
    {
        return $this->query()->find($id);
    }

    public function get($id)
    {
        return 1;
    }

    public function update($data)
    {
        return 1;
    }

    public function delete($id)
    {
        return 1;
    }

}
