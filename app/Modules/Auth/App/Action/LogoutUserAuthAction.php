<?php
namespace App\Modules\Auth\App\Action;

use App\Modules\Auth\App\Action\Base\AbstractAuthAction;

class LogoutUserAuthAction extends AbstractAuthAction
{
    public function run() : bool
    {
        return $this->authMethod->logout();
    }

}
