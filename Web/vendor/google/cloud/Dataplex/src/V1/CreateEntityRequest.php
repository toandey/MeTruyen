<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dataplex/v1/metadata.proto

namespace Google\Cloud\Dataplex\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Create a metadata entity request.
 *
 * Generated from protobuf message <code>google.cloud.dataplex.v1.CreateEntityRequest</code>
 */
class CreateEntityRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The resource name of the parent zone:
     * `projects/{project_number}/locations/{location_id}/lakes/{lake_id}/zones/{zone_id}`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Required. Entity resource.
     *
     * Generated from protobuf field <code>.google.cloud.dataplex.v1.Entity entity = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $entity = null;
    /**
     * Optional. Only validate the request, but do not perform mutations.
     * The default is false.
     *
     * Generated from protobuf field <code>bool validate_only = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $validate_only = false;

    /**
     * @param string                           $parent Required. The resource name of the parent zone:
     *                                                 `projects/{project_number}/locations/{location_id}/lakes/{lake_id}/zones/{zone_id}`. Please see
     *                                                 {@see MetadataServiceClient::zoneName()} for help formatting this field.
     * @param \Google\Cloud\Dataplex\V1\Entity $entity Required. Entity resource.
     *
     * @return \Google\Cloud\Dataplex\V1\CreateEntityRequest
     *
     * @experimental
     */
    public static function build(string $parent, \Google\Cloud\Dataplex\V1\Entity $entity): self
    {
        return (new self())
            ->setParent($parent)
            ->setEntity($entity);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. The resource name of the parent zone:
     *           `projects/{project_number}/locations/{location_id}/lakes/{lake_id}/zones/{zone_id}`.
     *     @type \Google\Cloud\Dataplex\V1\Entity $entity
     *           Required. Entity resource.
     *     @type bool $validate_only
     *           Optional. Only validate the request, but do not perform mutations.
     *           The default is false.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dataplex\V1\Metadata::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The resource name of the parent zone:
     * `projects/{project_number}/locations/{location_id}/lakes/{lake_id}/zones/{zone_id}`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. The resource name of the parent zone:
     * `projects/{project_number}/locations/{location_id}/lakes/{lake_id}/zones/{zone_id}`.
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
     * Required. Entity resource.
     *
     * Generated from protobuf field <code>.google.cloud.dataplex.v1.Entity entity = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Dataplex\V1\Entity|null
     */
    public function getEntity()
    {
        return $this->entity;
    }

    public function hasEntity()
    {
        return isset($this->entity);
    }

    public function clearEntity()
    {
        unset($this->entity);
    }

    /**
     * Required. Entity resource.
     *
     * Generated from protobuf field <code>.google.cloud.dataplex.v1.Entity entity = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Dataplex\V1\Entity $var
     * @return $this
     */
    public function setEntity($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dataplex\V1\Entity::class);
        $this->entity = $var;

        return $this;
    }

    /**
     * Optional. Only validate the request, but do not perform mutations.
     * The default is false.
     *
     * Generated from protobuf field <code>bool validate_only = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getValidateOnly()
    {
        return $this->validate_only;
    }

    /**
     * Optional. Only validate the request, but do not perform mutations.
     * The default is false.
     *
     * Generated from protobuf field <code>bool validate_only = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setValidateOnly($var)
    {
        GPBUtil::checkBool($var);
        $this->validate_only = $var;

        return $this;
    }

}

