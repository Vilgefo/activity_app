<?php

namespace App\Http\Controllers;

use App\Services\Api\DataApi;
use App\Services\JsonRpc\JsonRpcResponse;
use App\Services\JsonRpc\JsonRpcServer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function api(\Request $request, JsonRpcServer $jsonRpcServer, DataApi $dataApi){
        return $jsonRpcServer->handle($request::toArray(), $dataApi);
    }
}
