<?php
// GENERATED CODE -- DO NOT EDIT!

namespace GRPC\UserService;

/**
 */
class UserServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \GRPC\UserService\GetUserByTokenRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function getUserByToken(\GRPC\UserService\GetUserByTokenRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/user.UserService/getUserByToken',
        $argument,
        ['\GRPC\UserService\UserResponse', 'decode'],
        $metadata, $options);
    }

}
