<?php
declare(strict_types=1);
namespace GRPC;

use GRPC\UserService\GetUserByTokenRequest;
use GRPC\UserService\UserResponse;
use GRPC\UserService\UserServiceInterface;
use Spiral\RoadRunner\GRPC;

class UserServiceServer implements UserServiceInterface
{

    /**
     * @param GRPC\ContextInterface $ctx
     * @param GetUserByTokenRequest $in
     * @return UserResponse
     */
    public function getUserByToken(GRPC\ContextInterface $ctx, GetUserByTokenRequest $in): UserResponse
    {
        $token = $in->getToken();

        $response = new UserResponse();
        $response->setId(33);
        $response->setName('Dummy' . $token);
        $response->setCreatedAt("dummy date");
        $response->setEmail('dummy@du.mmy');

        return $response;
    }
}
