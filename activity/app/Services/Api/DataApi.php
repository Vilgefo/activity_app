<?php
namespace App\Services\Api;

use App\Models\RoutesHistory;

class DataApi
{
    public function save($route, $ip): void
    {
        RoutesHistory::createRoute($route, $ip);
    }
    public function show(): array
    {
        return RoutesHistory::getGroupedRoutes();
    }
}

