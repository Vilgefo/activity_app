<?php

namespace App\Services\Activity;

use App\Services\JsonRpc\JsonRpcClient;

class ActivityApi
{

    protected $client;

    public function __construct(JsonRpcClient $client)
    {
        $this->client = $client;
    }

    public function save(string $url, string $ip, string $date): array
    {
        return $this->client->send('save', ['route'=>$url, 'ip'=>$ip, 'date' => $date]);
    }

    public function show(string $ip): array
    {
        return $this->client->send('show', ['ip' => $ip]);
    }
}
