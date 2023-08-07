<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Grpc\ChannelCredentials;
use GRPC\GPBMetadata\Pinger;
use GRPC\Pinger\PingRequest;
use Illuminate\Http\JsonResponse;

class PingerController extends Controller
{
    /**
     * @return JsonResponse
     * @var Pinger
     */
    public function execute(): JsonResponse
    {
        return response()->json([]);
    }
}
