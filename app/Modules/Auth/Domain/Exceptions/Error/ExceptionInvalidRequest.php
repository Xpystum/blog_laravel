<?php
namespace App\Modules\Auth\Domain\Exceptions\Error;

use App\Modules\Auth\Domain\Exceptions\Error\Trait\ExceptionResponseTrait;

use Exception;

class ExceptionInvalidRequest extends Exception
{
   use ExceptionResponseTrait;

}
