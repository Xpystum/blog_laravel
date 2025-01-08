<?php
namespace App\Modules\Base\Errors;

class BusinessException extends \RuntimeException
{
    /**
    * @var string[]|string
    */
    private $messageCustom;

    /**
    * @var int
    */
    private ?int $codeCustom;

    public function __construct(string|array $messageCustom, $codeCustom = 400)
    {
        $this->messageCustom = $messageCustom;
        $this->codeCustom = $codeCustom;
        parent::__construct("Business exception", $this->codeCustom);
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
