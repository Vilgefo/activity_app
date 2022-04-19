<?php
namespace App\Services\Api;

use App\Models\RoutesHistory;

class DataApi
{
    public function save(string $route, string $ip, string $date): void
    {
        RoutesHistory::createRoute($route, $ip, $date);
    }
    public function show(?string $ip = null): array
    {
        return RoutesHistory::getGroupedRoutes($ip);
    }
}

