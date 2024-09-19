<?php

namespace App\Modules\Auth\Domain\Interface;
use Illuminate\Foundation\Auth\User as Model;

interface AuthInterfaceCookie extends AuthInterface
{
    public function loginUser(Model $model);
    public function user();
}
