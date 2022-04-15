<?php

namespace App\Http\Controllers;

use App\Classes\ActivityManager;
use ClientApp\Services\JsonRpcClient;
use Illuminate\Routing\Controller as BaseController;
use App\Helpers\Helpers;

class SiteController extends BaseController
{
    protected $activityManager;

    public function __construct(ActivityManager $activityManager)
    {
        $this->activityManager = $activityManager;
    }

    public function show(\Request $request)
    {
        $data = $this->activityManager->show();
        return $data;
    }
}
