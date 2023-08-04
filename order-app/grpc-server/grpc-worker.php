<?php

use App\Services\Pinger;
use GRPC\Pinger\PingerInterface;
use Spiral\RoadRunner\GRPC\Server;
use Spiral\RoadRunner\Worker;

require __DIR__ . '/vendor/autoload.php';

$server = new Server(null, [
    'debug' => true, // optional (default: false)
]);

$server->registerService(PingerInterface::class, new Pinger());

$server->serve(Worker::create());
