<?php

namespace App\Http\Controllers;

use App\Classes\ActivityManager;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class SiteController extends BaseController
{
    protected $activityManager;

    public function __construct(ActivityManager $activityManager)
    {
        $this->activityManager = $activityManager;
    }

    public function show(Request $request)
    {
        $limit = 5;
        $page = $request->page ?? 1;
        $routes = $this->activityManager->show($page-1 * $limit, $limit);
        $paginator = new LengthAwarePaginator(array_slice($routes, ($page-1) * $limit, $limit), count(array_chunk($routes, $limit)), 1, $request->page ?? 1);
        return view('view', ['routes'=>$paginator]);
    }
}
