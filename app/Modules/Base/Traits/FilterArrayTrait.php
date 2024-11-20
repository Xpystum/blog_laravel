<?php

namespace App\Modules\Base\Traits;

trait FilterArrayTrait
{
    public function toArrayNotNull() : array
    {
        $arrayFilter = array_filter($this->toArray(), function($value) {
            return !is_null($value);
        });

        return $arrayFilter;
    }
}
