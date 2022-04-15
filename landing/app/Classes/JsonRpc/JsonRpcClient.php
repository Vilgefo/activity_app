<?php
namespace App\Classes\JsonRpc;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class JsonRpcClient
{
    const JSON_RPC_VERSION = '2.0';

    const METHOD_URI = 'api';

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => ['Content-Type' => 'application/json'],
            'base_uri' => 'http://activity/'
        ]);
    }

    public function send(string $method, array $params = []): array
    {
        $response = $this->client
            ->post(self::METHOD_URI, [
                RequestOptions::JSON => [
                    'jsonrpc' => self::JSON_RPC_VERSION,
                    'id' => time(),
                    'method' => $method,
                    'params' => $params
                ]
            ])->getBody()->getContents();
        $result = json_decode($response, true);
        if(isset($result['result'])){
            return $result['result'];
        }
        Throw new \Exception($result['error'] ?? 'undefined error in query');
    }
}
