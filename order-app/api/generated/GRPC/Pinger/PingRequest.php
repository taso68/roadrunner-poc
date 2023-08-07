<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/pinger.proto

namespace GRPC\Pinger;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>pinger.PingRequest</code>
 */
class PingRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 url = 1;</code>
     */
    private $url = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $url
     * }
     */
    public function __construct($data = NULL) {
        \GRPC\GPBMetadata\Pinger::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 url = 1;</code>
     * @return int
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Generated from protobuf field <code>int32 url = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setUrl($var)
    {
        GPBUtil::checkInt32($var);
        $this->url = $var;

        return $this;
    }

}

