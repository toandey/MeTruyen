<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/identity/accesscontextmanager/v1/access_context_manager.proto

namespace Google\Identity\AccessContextManager\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A response to ReplaceAccessLevelsRequest. This will be put inside of
 * Operation.response field.
 *
 * Generated from protobuf message <code>google.identity.accesscontextmanager.v1.ReplaceAccessLevelsResponse</code>
 */
class ReplaceAccessLevelsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * List of the [Access Level]
     * [google.identity.accesscontextmanager.v1.AccessLevel] instances.
     *
     * Generated from protobuf field <code>repeated .google.identity.accesscontextmanager.v1.AccessLevel access_levels = 1;</code>
     */
    private $access_levels;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Identity\AccessContextManager\V1\AccessLevel>|\Google\Protobuf\Internal\RepeatedField $access_levels
     *           List of the [Access Level]
     *           [google.identity.accesscontextmanager.v1.AccessLevel] instances.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Identity\Accesscontextmanager\V1\AccessContextManager::initOnce();
        parent::__construct($data);
    }

    /**
     * List of the [Access Level]
     * [google.identity.accesscontextmanager.v1.AccessLevel] instances.
     *
     * Generated from protobuf field <code>repeated .google.identity.accesscontextmanager.v1.AccessLevel access_levels = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAccessLevels()
    {
        return $this->access_levels;
    }

    /**
     * List of the [Access Level]
     * [google.identity.accesscontextmanager.v1.AccessLevel] instances.
     *
     * Generated from protobuf field <code>repeated .google.identity.accesscontextmanager.v1.AccessLevel access_levels = 1;</code>
     * @param array<\Google\Identity\AccessContextManager\V1\AccessLevel>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAccessLevels($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Identity\AccessContextManager\V1\AccessLevel::class);
        $this->access_levels = $arr;

        return $this;
    }

}

