<?php

final class FunctionResult
{
    /** @var bool */
    public $success;

    /** @var mixed */
    public $returnValue;

    /** @var string */
    public $errorMessage;

    private function __construct() {}

    public static function success(
        $returnValue = null): FunctionResult
    {
        $result = new self();
        $result->success = true;
        $result->returnValue = $returnValue;

        return $result;
    }

    public static function error(
        string $errorMessage): FunctionResult
    {
        $result = new self();
        $result->success = false;
        $result->errorMessage = $errorMessage;

        return $result;
    }
}
