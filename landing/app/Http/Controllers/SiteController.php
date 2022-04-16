<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteRequest;
use App\Services\Activity\ActivityManager;
use Illuminate\Routing\Controller as BaseController;

class SiteController extends BaseController
{
    protected $activityManager;

    public function __construct(ActivityManager $activityManager)
    {
        $this->activityManager = $activityManager;
    }

    public function show(RouteRequest $request)
    {
        $request->validated();
        return view('view', ['routes'=>$this->activityManager->getRoutesPaginator(5, $request->page ?? 1)]);
    }
}
