<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class RoutesHistory extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $table = 'routes_history';
    protected $guarded = [];


    public static function createRoute(string $route, string $ip, string $date): void
    {
        self::create([
            'route' => $route,
            'ip' => $ip,
            'created_at' => $date
        ]);
    }

    public static function getGroupedRoutes(?string $ip = null): array
    {
        $builder = RoutesHistory::selectRaw('route, ip, COUNT(route) as count, MAX(created_at) as last_ts')->groupBy(['route', 'ip'])->orderByDesc('last_ts');
        if($ip){
            $builder->where(['ip'=>$ip]);
        }
        return $builder->get()->toArray();
    }
}
