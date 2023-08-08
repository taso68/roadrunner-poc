<?php

use GRPC\UserService\UserServiceInterface;
use GRPC\UserServiceServer;
use Spiral\RoadRunner\GRPC\Server;
use Spiral\RoadRunner\Worker;

require __DIR__ . '/vendor/autoload.php';

$server = new Server(null, [
    'debug' => false
]);

$server->registerService(UserServiceInterface::class, new UserServiceServer());

$server->serve(Worker::create());
