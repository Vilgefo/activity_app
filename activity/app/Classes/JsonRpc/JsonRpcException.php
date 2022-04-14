<?php
namespace App\Classes\JsonRpc;

class JsonRpcException extends \Exception
{
    const PARSE_ERROR = 1;
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
