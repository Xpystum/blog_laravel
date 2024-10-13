<?php
namespace App\Modules\Auth\App\Action;

use App\Modules\Auth\App\Action\Base\AbstractAuthAction;

class RefreshUserAuthAction extends AbstractAuthAction
{
    public function run() : ?array
    {
        return $this->authMethod->refresh();
    }

}
