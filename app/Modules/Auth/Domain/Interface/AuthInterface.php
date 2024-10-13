<?php

namespace App\Modules\Auth\Domain\Interface;

use App\Modules\Auth\App\Data\DTO\BaseDTO;
use Illuminate\Database\Eloquent\Model;

interface AuthInterface
{
    public function attemptUser(BaseDTO $data);
    public function logout();
}
