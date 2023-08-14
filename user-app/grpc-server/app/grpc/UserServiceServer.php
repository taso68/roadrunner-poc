<?php
declare(strict_types=1);

namespace app\grpc;

use GRPC\UserService\GetUserByTokenRequest;
use GRPC\UserService\UserResponse;
use GRPC\UserService\UserServiceInterface;
use Spiral\RoadRunner\GRPC;

class UserServiceServer implements UserServiceInterface
{

    public function getUserByToken(GRPC\ContextInterface $ctx, GetUserByTokenRequest $in): UserResponse
    {
        $res = new UserResponse();
        $res->setName('taso');
        $res->setEmail('test');
        $res->setCreatedAt('dummy');
        $res->setId(12);
        return $res;
    }
}
