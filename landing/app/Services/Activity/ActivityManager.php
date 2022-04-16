<?php

namespace App\Services\Activity;

use App\Helpers\Helpers;
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
        return ActivityDataManipulator::getRoutesPaginator($this->activityApi->show(), $limit, $page);
    }
    public function saveRouteWithUserIp(){
        $this->activityApi->save(Helpers::uriWithoutGet(), Helpers::getRealIp());
    }
}
