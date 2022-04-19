<?php

namespace App\Services\Activity;

use Illuminate\Pagination\LengthAwarePaginator;


class ActivityDataManipulator
{

    public static function getRoutesPaginator(array $routes, int $limit, int $currentPage): LengthAwarePaginator
    {
        $items = array_slice($routes, ($currentPage-1) * $limit, $limit);
        $total = count($routes);
        return new LengthAwarePaginator($items, $total , $limit, $currentPage, ['path' => '/admin/activity']);
    }

}
