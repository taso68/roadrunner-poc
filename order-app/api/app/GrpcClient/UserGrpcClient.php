<?php
declare(strict_types=1);

namespace App\GrpcClient;

use Grpc\ChannelCredentials;
use GRPC\User\GetUserByTokenRequest;
use GRPC\User\UserClient;
use GRPC\User\UserResponse;

class UserGrpcClient
{
    /**
     * @var UserClient
     */
    private UserClient $client;

    public function __construct(string $host)
    {
        $this->client = new UserClient($host, [
            'credentials' => ChannelCredentials::createInsecure()
        ]);

    }

    public function getUserByToken($token)
    {
        $userRequest = new GetUserByTokenRequest();
        $userRequest->setToken($token);
        $request = $this->client->getUserByToken($userRequest);

        $response = $request->wait();
        dd($response[1]);
        return $response;
    }

}
