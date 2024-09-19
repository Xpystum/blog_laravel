<?php

namespace App\Modules\Auth\App\Action;

use App\Modules\Auth\App\Action\Base\AbstractAuthAction;
use Illuminate\Database\Eloquent\Model;

class loginUserAuthAction extends AbstractAuthAction
{
    public function run(Model $model) : ?array
    {
        return $this->authMethod->loginUser($model);
    }

}
