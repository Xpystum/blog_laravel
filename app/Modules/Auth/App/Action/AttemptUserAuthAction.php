<?php

namespace App\Modules\Auth\App\Action;

use App\Modules\Auth\App\Action\Base\AbstractAuthAction;
use App\Modules\Auth\App\Data\DTO\BaseDTO;

class AttemptUserAuthAction extends AbstractAuthAction
{
    public function run(BaseDTO $data)
    {
        return $this->authMethod->attemptUser($data);
    }

}
