<?php

namespace App\Http\Middleware;

use App\Services\Activity\ActivityManager;
use Closure;
use Illuminate\Http\Request;

class Routes
{
    protected $activityManager;

    public function __construct(ActivityManager $activityManager)
    {
        $this->activityManager = $activityManager;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $this->activityManager->saveRouteWithUserIp();
        return $next($request);
    }
}
