<?php
// GENERATED CODE -- DO NOT EDIT!

namespace GRPC\User;

/**
 */
class UserClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \GRPC\User\GetUserByTokenRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function getUserByToken(\GRPC\User\GetUserByTokenRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/grpc.user.User/getUserByToken',
        $argument,
        ['\GRPC\User\UserResponse', 'decode'],
        $metadata, $options);
    }

}
