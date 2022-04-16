<?php
namespace App\Services\JsonRpc;
class JsonRpcServer
{
    public function handle($content, $api)
    {
        try {
            if (empty($content)) {
                throw new JsonRpcException('Parse error', JsonRpcException::PARSE_ERROR);
            }
            $result = $api->{$content['method']}(...$content['params']) ?? [];

            return JsonRpcResponse::success($result, $content['id']);
        } catch (\Throwable $e) {
            return JsonRpcResponse::error($e->getMessage(), $content['id'] ?? null);
        }
    }
}
