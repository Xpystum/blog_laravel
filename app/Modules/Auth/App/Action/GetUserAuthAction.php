<?php

namespace App\Modules\Auth\App\Action;

use App\Modules\Auth\App\Action\Base\AbstractAuthAction;
use Illuminate\Database\Eloquent\Model;

class GetUserAuthAction extends AbstractAuthAction
{
    public function run() : ?Model
    {
        return $this->authMethod->user();
    }

}
