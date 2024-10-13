<?php
namespace App\Modules\Auth\App\Action\Base;

use App\Modules\Auth\Domain\Interface\AuthInterface;
use Exception;

abstract class AbstractAuthAction
{
    protected ?AuthInterface $authMethod = null;

    public function __construct(AuthInterface $authMethod)
    {
        $this->authMethod = $authMethod;
    }

    public static function make(AuthInterface $authMethod): static
    {
        return new static($authMethod);
    }

    public function error(\Throwable $error)
    {
        logger('Критическая Ошибка:', ['error' => $error]);
        throw new Exception("Критическая Ошибка: {$error->getMessage()}");
    }


}
