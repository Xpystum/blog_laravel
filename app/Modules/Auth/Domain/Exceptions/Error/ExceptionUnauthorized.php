<?php
namespace App\Modules\Auth\Domain\Exceptions\Error;
use App\Modules\Auth\Domain\Exceptions\Error\Trait\ExceptionResponseTrait;
use Exception;

class ExceptionUnauthorized extends Exception
{
    use ExceptionResponseTrait;

}
