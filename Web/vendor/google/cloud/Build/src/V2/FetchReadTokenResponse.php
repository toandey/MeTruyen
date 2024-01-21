<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/devtools/cloudbuild/v2/repositories.proto

namespace Google\Cloud\Build\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Message for responding to get read token.
 *
 * Generated from protobuf message <code>google.devtools.cloudbuild.v2.FetchReadTokenResponse</code>
 */
class FetchReadTokenResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The token content.
     *
     * Generated from protobuf field <code>string token = 1;</code>
     */
    private $token = '';
    /**
     * Expiration timestamp. Can be empty if unknown or non-expiring.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp expiration_time = 2;</code>
     */
    private $expiration_time = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $token
     *           The token content.
     *     @type \Google\Protobuf\Timestamp $expiration_time
     *           Expiration timestamp. Can be empty if unknown or non-expiring.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Devtools\Cloudbuild\V2\Repositories::initOnce();
        parent::__construct($data);
    }

    /**
     * The token content.
     *
     * Generated from protobuf field <code>string token = 1;</code>
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * The token content.
     *
     * Generated from protobuf field <code>string token = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->token = $var;

        return $this;
    }

    /**
     * Expiration timestamp. Can be empty if unknown or non-expiring.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp expiration_time = 2;</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getExpirationTime()
    {
        return $this->expiration_time;
    }

    public function hasExpirationTime()
    {
        return isset($this->expiration_time);
    }

    public function clearExpirationTime()
    {
        unset($this->expiration_time);
    }

    /**
     * Expiration timestamp. Can be empty if unknown or non-expiring.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp expiration_time = 2;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setExpirationTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->expiration_time = $var;

        return $this;
    }

}

