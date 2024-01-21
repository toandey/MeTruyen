<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/eventarc/v1/eventarc.proto

namespace Google\Cloud\Eventarc\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The request message for the CreateChannelConnection method.
 *
 * Generated from protobuf message <code>google.cloud.eventarc.v1.CreateChannelConnectionRequest</code>
 */
class CreateChannelConnectionRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The parent collection in which to add this channel connection.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Required. Channel connection to create.
     *
     * Generated from protobuf field <code>.google.cloud.eventarc.v1.ChannelConnection channel_connection = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $channel_connection = null;
    /**
     * Required. The user-provided ID to be assigned to the channel connection.
     *
     * Generated from protobuf field <code>string channel_connection_id = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $channel_connection_id = '';

    /**
     * @param string                                      $parent              Required. The parent collection in which to add this channel connection. Please see
     *                                                                         {@see EventarcClient::locationName()} for help formatting this field.
     * @param \Google\Cloud\Eventarc\V1\ChannelConnection $channelConnection   Required. Channel connection to create.
     * @param string                                      $channelConnectionId Required. The user-provided ID to be assigned to the channel connection.
     *
     * @return \Google\Cloud\Eventarc\V1\CreateChannelConnectionRequest
     *
     * @experimental
     */
    public static function build(string $parent, \Google\Cloud\Eventarc\V1\ChannelConnection $channelConnection, string $channelConnectionId): self
    {
        return (new self())
            ->setParent($parent)
            ->setChannelConnection($channelConnection)
            ->setChannelConnectionId($channelConnectionId);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. The parent collection in which to add this channel connection.
     *     @type \Google\Cloud\Eventarc\V1\ChannelConnection $channel_connection
     *           Required. Channel connection to create.
     *     @type string $channel_connection_id
     *           Required. The user-provided ID to be assigned to the channel connection.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Eventarc\V1\Eventarc::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The parent collection in which to add this channel connection.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. The parent collection in which to add this channel connection.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * Required. Channel connection to create.
     *
     * Generated from protobuf field <code>.google.cloud.eventarc.v1.ChannelConnection channel_connection = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Eventarc\V1\ChannelConnection|null
     */
    public function getChannelConnection()
    {
        return $this->channel_connection;
    }

    public function hasChannelConnection()
    {
        return isset($this->channel_connection);
    }

    public function clearChannelConnection()
    {
        unset($this->channel_connection);
    }

    /**
     * Required. Channel connection to create.
     *
     * Generated from protobuf field <code>.google.cloud.eventarc.v1.ChannelConnection channel_connection = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Eventarc\V1\ChannelConnection $var
     * @return $this
     */
    public function setChannelConnection($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Eventarc\V1\ChannelConnection::class);
        $this->channel_connection = $var;

        return $this;
    }

    /**
     * Required. The user-provided ID to be assigned to the channel connection.
     *
     * Generated from protobuf field <code>string channel_connection_id = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getChannelConnectionId()
    {
        return $this->channel_connection_id;
    }

    /**
     * Required. The user-provided ID to be assigned to the channel connection.
     *
     * Generated from protobuf field <code>string channel_connection_id = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setChannelConnectionId($var)
    {
        GPBUtil::checkString($var, True);
        $this->channel_connection_id = $var;

        return $this;
    }

}
