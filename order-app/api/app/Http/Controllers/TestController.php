<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\GrpcClient\UserGrpcClient;
use Illuminate\Http\JsonResponse;

class TestController
{
    public function getByToken(): JsonResponse
    {
        $res = new UserGrpcClient('user_app_grpc:2000');
        $res->getUserByToken('123');
        return response()->json([$res]);
    }
}
