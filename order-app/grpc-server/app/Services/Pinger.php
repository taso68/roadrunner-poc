<?php
declare(strict_types=1);

namespace App\Services;

use GRPC\Pinger\PingerInterface;
use GRPC\Pinger\PingRequest;
use GRPC\Pinger\PingResponse;
use Spiral\RoadRunner\GRPC;

class Pinger implements PingerInterface
{
    public function ping(GRPC\ContextInterface $ctx, PingRequest $in): PingResponse
    {
        $output = 'Ulaz je '. $in->getUrl();
        return new PingResponse([
            'status_code' => $output
        ]);
    }
}
