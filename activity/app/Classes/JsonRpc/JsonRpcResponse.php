<?php
namespace App\Classes\JsonRpc;

class JsonRpcResponse
{
    const JSON_RPC_VERSION = '2.0';

    public static function success(array $result = [], ?string $id = null): array
    {
        return [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'result'  => $result,
            'id'      => $id,
        ];
    }

    public static function error(string $error, ?int $id = null): array
    {
        return [
            'jsonrpc' => self::JSON_RPC_VERSION,
            'error'  => $error,
            'id'      => $id,
        ];
    }
}
