<?php
namespace App\Modules\Auth\App\Data\DTO;

use Illuminate\Contracts\Support\Arrayable;

abstract class BaseDTO implements Arrayable
{
    public abstract function toArray() : array;
}
