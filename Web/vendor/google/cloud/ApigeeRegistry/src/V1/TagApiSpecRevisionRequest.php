<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/apigeeregistry/v1/registry_service.proto

namespace Google\Cloud\ApigeeRegistry\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for TagApiSpecRevision.
 *
 * Generated from protobuf message <code>google.cloud.apigeeregistry.v1.TagApiSpecRevisionRequest</code>
 */
class TagApiSpecRevisionRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The name of the spec to be tagged, including the revision ID.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $name = '';
    /**
     * Required. The tag to apply.
     * The tag should be at most 40 characters, and match `[a-z][a-z0-9-]{3,39}`.
     *
     * Generated from protobuf field <code>string tag = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $tag = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Required. The name of the spec to be tagged, including the revision ID.
     *     @type string $tag
     *           Required. The tag to apply.
     *           The tag should be at most 40 characters, and match `[a-z][a-z0-9-]{3,39}`.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Apigeeregistry\V1\RegistryService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The name of the spec to be tagged, including the revision ID.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. The name of the spec to be tagged, including the revision ID.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Required. The tag to apply.
     * The tag should be at most 40 characters, and match `[a-z][a-z0-9-]{3,39}`.
     *
     * Generated from protobuf field <code>string tag = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Required. The tag to apply.
     * The tag should be at most 40 characters, and match `[a-z][a-z0-9-]{3,39}`.
     *
     * Generated from protobuf field <code>string tag = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setTag($var)
    {
        GPBUtil::checkString($var, True);
        $this->tag = $var;

        return $this;
    }

}

