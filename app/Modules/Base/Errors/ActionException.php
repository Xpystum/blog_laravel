<?php

namespace App\Modules\Base\Errors;

use Exception;

class ActionException extends Exception {

    /**
    * @var string[]|string
    */
    private $messageCustom;

    /**
    * @var int
    */
    private ?int $codeCustom;

    public function __construct(string|array $messageCustom, $codeCustom = 500)
    {
        $this->messageCustom = $messageCustom;
        $this->codeCustom = $codeCustom;
        parent::__construct("Action exception", $this->codeCustom);
    }

    /**
     * @return string|string[]
     */
    public function getCustomMessage(): string|array
    {
        return $this->messageCustom;
    }

    /**
     * @return string|string[]
     */
    public function getCustomCode(): string|array
    {
        return $this->messageCustom;
    }
    
}

