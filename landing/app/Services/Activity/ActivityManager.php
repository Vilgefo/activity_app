<?php

namespace App\Services\Activity;

use App\Helpers\UrlHelpers;
use App\Helpers\IpHelpers;
use App\Helpers\DateHelpers;
use Illuminate\Pagination\LengthAwarePaginator;

/*
 * combine logic of two classes
 */
class ActivityManager
{

    protected $activityApi;

    public function __construct(ActivityApi $activityApi)
    {
        $this->activityApi = $activityApi;
    }

    public function getRoutesPaginator(int $limit, int $page): LengthAwarePaginator
    {
        $routes = $this->activityApi->show(IpHelpers::getRealIp());
        return ActivityDataManipulator::getRoutesPaginator($routes, $limit, $page);
    }
    public function saveRouteWithUserIp(): void
    {
        $this->activityApi->save(UrlHelpers::uriWithoutGet(), IpHelpers::getRealIp(), DateHelpers::getUserDate());
    }
}
