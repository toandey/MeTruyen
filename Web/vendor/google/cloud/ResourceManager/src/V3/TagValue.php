<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/resourcemanager/v3/tag_values.proto

namespace Google\Cloud\ResourceManager\V3;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A TagValue is a child of a particular TagKey. This is used to group
 * cloud resources for the purpose of controlling them using policies.
 *
 * Generated from protobuf message <code>google.cloud.resourcemanager.v3.TagValue</code>
 */
class TagValue extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. Resource name for TagValue in the format `tagValues/456`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $name = '';
    /**
     * Immutable. The resource name of the new TagValue's parent TagKey.
     * Must be of the form `tagKeys/{tag_key_id}`.
     *
     * Generated from protobuf field <code>string parent = 2 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $parent = '';
    /**
     * Required. Immutable. User-assigned short name for TagValue. The short name
     * should be unique for TagValues within the same parent TagKey.
     * The short name must be 63 characters or less, beginning and ending with
     * an alphanumeric character ([a-z0-9A-Z]) with dashes (-), underscores (_),
     * dots (.), and alphanumerics between.
     *
     * Generated from protobuf field <code>string short_name = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $short_name = '';
    /**
     * Output only. The namespaced name of the TagValue. Can be in the form
     * `{organization_id}/{tag_key_short_name}/{tag_value_short_name}` or
     * `{project_id}/{tag_key_short_name}/{tag_value_short_name}` or
     * `{project_number}/{tag_key_short_name}/{tag_value_short_name}`.
     *
     * Generated from protobuf field <code>string namespaced_name = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $namespaced_name = '';
    /**
     * Optional. User-assigned description of the TagValue.
     * Must not exceed 256 characters.
     * Read-write.
     *
     * Generated from protobuf field <code>string description = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $description = '';
    /**
     * Output only. Creation time.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $create_time = null;
    /**
     * Output only. Update time.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $update_time = null;
    /**
     * Optional. Entity tag which users can pass to prevent race conditions. This
     * field is always set in server responses. See UpdateTagValueRequest for
     * details.
     *
     * Generated from protobuf field <code>string etag = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $etag = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Immutable. Resource name for TagValue in the format `tagValues/456`.
     *     @type string $parent
     *           Immutable. The resource name of the new TagValue's parent TagKey.
     *           Must be of the form `tagKeys/{tag_key_id}`.
     *     @type string $short_name
     *           Required. Immutable. User-assigned short name for TagValue. The short name
     *           should be unique for TagValues within the same parent TagKey.
     *           The short name must be 63 characters or less, beginning and ending with
     *           an alphanumeric character ([a-z0-9A-Z]) with dashes (-), underscores (_),
     *           dots (.), and alphanumerics between.
     *     @type string $namespaced_name
     *           Output only. The namespaced name of the TagValue. Can be in the form
     *           `{organization_id}/{tag_key_short_name}/{tag_value_short_name}` or
     *           `{project_id}/{tag_key_short_name}/{tag_value_short_name}` or
     *           `{project_number}/{tag_key_short_name}/{tag_value_short_name}`.
     *     @type string $description
     *           Optional. User-assigned description of the TagValue.
     *           Must not exceed 256 characters.
     *           Read-write.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. Creation time.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           Output only. Update time.
     *     @type string $etag
     *           Optional. Entity tag which users can pass to prevent race conditions. This
     *           field is always set in server responses. See UpdateTagValueRequest for
     *           details.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Resourcemanager\V3\TagValues::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. Resource name for TagValue in the format `tagValues/456`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Immutable. Resource name for TagValue in the format `tagValues/456`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
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
     * Immutable. The resource name of the new TagValue's parent TagKey.
     * Must be of the form `tagKeys/{tag_key_id}`.
     *
     * Generated from protobuf field <code>string parent = 2 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Immutable. The resource name of the new TagValue's parent TagKey.
     * Must be of the form `tagKeys/{tag_key_id}`.
     *
     * Generated from protobuf field <code>string parent = 2 [(.google.api.field_behavior) = IMMUTABLE];</code>
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
     * Required. Immutable. User-assigned short name for TagValue. The short name
     * should be unique for TagValues within the same parent TagKey.
     * The short name must be 63 characters or less, beginning and ending with
     * an alphanumeric character ([a-z0-9A-Z]) with dashes (-), underscores (_),
     * dots (.), and alphanumerics between.
     *
     * Generated from protobuf field <code>string short_name = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getShortName()
    {
        return $this->short_name;
    }

    /**
     * Required. Immutable. User-assigned short name for TagValue. The short name
     * should be unique for TagValues within the same parent TagKey.
     * The short name must be 63 characters or less, beginning and ending with
     * an alphanumeric character ([a-z0-9A-Z]) with dashes (-), underscores (_),
     * dots (.), and alphanumerics between.
     *
     * Generated from protobuf field <code>string short_name = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @param string $var
     * @return $this
     */
    public function setShortName($var)
    {
        GPBUtil::checkString($var, True);
        $this->short_name = $var;

        return $this;
    }

    /**
     * Output only. The namespaced name of the TagValue. Can be in the form
     * `{organization_id}/{tag_key_short_name}/{tag_value_short_name}` or
     * `{project_id}/{tag_key_short_name}/{tag_value_short_name}` or
     * `{project_number}/{tag_key_short_name}/{tag_value_short_name}`.
     *
     * Generated from protobuf field <code>string namespaced_name = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getNamespacedName()
    {
        return $this->namespaced_name;
    }

    /**
     * Output only. The namespaced name of the TagValue. Can be in the form
     * `{organization_id}/{tag_key_short_name}/{tag_value_short_name}` or
     * `{project_id}/{tag_key_short_name}/{tag_value_short_name}` or
     * `{project_number}/{tag_key_short_name}/{tag_value_short_name}`.
     *
     * Generated from protobuf field <code>string namespaced_name = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setNamespacedName($var)
    {
        GPBUtil::checkString($var, True);
        $this->namespaced_name = $var;

        return $this;
    }

    /**
     * Optional. User-assigned description of the TagValue.
     * Must not exceed 256 characters.
     * Read-write.
     *
     * Generated from protobuf field <code>string description = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Optional. User-assigned description of the TagValue.
     * Must not exceed 256 characters.
     * Read-write.
     *
     * Generated from protobuf field <code>string description = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

    /**
     * Output only. Creation time.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    public function hasCreateTime()
    {
        return isset($this->create_time);
    }

    public function clearCreateTime()
    {
        unset($this->create_time);
    }

    /**
     * Output only. Creation time.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

    /**
     * Output only. Update time.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    public function hasUpdateTime()
    {
        return isset($this->update_time);
    }

    public function clearUpdateTime()
    {
        unset($this->update_time);
    }

    /**
     * Output only. Update time.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setUpdateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->update_time = $var;

        return $this;
    }

    /**
     * Optional. Entity tag which users can pass to prevent race conditions. This
     * field is always set in server responses. See UpdateTagValueRequest for
     * details.
     *
     * Generated from protobuf field <code>string etag = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * Optional. Entity tag which users can pass to prevent race conditions. This
     * field is always set in server responses. See UpdateTagValueRequest for
     * details.
     *
     * Generated from protobuf field <code>string etag = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setEtag($var)
    {
        GPBUtil::checkString($var, True);
        $this->etag = $var;

        return $this;
    }

}

