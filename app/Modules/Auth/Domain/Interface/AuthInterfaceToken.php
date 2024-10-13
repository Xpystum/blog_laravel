<?php
namespace App\Modules\Auth\Domain\Interface;

use Illuminate\Database\Eloquent\Model;

interface AuthInterfaceToken extends AuthInterface
{
    public function loginUser(Model $model);
    public function user();
    public function refresh();
    public function respondWithToken(string $token);
}
