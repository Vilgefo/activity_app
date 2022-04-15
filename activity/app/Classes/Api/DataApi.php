<?php
namespace App\Classes\Api;

use App\Models\RoutesHistory;

class DataApi
{
    public function save($route, $ip){
        RoutesHistory::create([
            'route' => $route,
            'ip' => $ip
        ]);
    }
    public function show($offset = 0, $limit = null){
        return RoutesHistory::selectRaw('route, ip, COUNT(route) as count, MAX(created_at) as last_ts')->groupBy(['route', 'ip'])->get()->toArray();
    }
}

