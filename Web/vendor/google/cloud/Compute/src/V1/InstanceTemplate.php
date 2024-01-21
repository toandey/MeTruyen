<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents an Instance Template resource. You can use instance templates to create VM instances and managed instance groups. For more information, read Instance Templates.
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.InstanceTemplate</code>
 */
class InstanceTemplate extends \Google\Protobuf\Internal\Message
{
    /**
     * [Output Only] The creation timestamp for this instance template in RFC3339 text format.
     *
     * Generated from protobuf field <code>optional string creation_timestamp = 30525366;</code>
     */
    private $creation_timestamp = null;
    /**
     * An optional description of this resource. Provide this property when you create the resource.
     *
     * Generated from protobuf field <code>optional string description = 422937596;</code>
     */
    private $description = null;
    /**
     * [Output Only] A unique identifier for this instance template. The server defines this identifier.
     *
     * Generated from protobuf field <code>optional uint64 id = 3355;</code>
     */
    private $id = null;
    /**
     * [Output Only] The resource type, which is always compute#instanceTemplate for instance templates.
     *
     * Generated from protobuf field <code>optional string kind = 3292052;</code>
     */
    private $kind = null;
    /**
     * Name of the resource; provided by the client when the resource is created. The name must be 1-63 characters long, and comply with RFC1035. Specifically, the name must be 1-63 characters long and match the regular expression `[a-z]([-a-z0-9]*[a-z0-9])?` which means the first character must be a lowercase letter, and all following characters must be a dash, lowercase letter, or digit, except the last character, which cannot be a dash.
     *
     * Generated from protobuf field <code>optional string name = 3373707;</code>
     */
    private $name = null;
    /**
     * The instance properties for this instance template.
     *
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.InstanceProperties properties = 147688755;</code>
     */
    private $properties = null;
    /**
     * [Output Only] URL of the region where the instance template resides. Only applicable for regional resources.
     *
     * Generated from protobuf field <code>optional string region = 138946292;</code>
     */
    private $region = null;
    /**
     * [Output Only] The URL for this instance template. The server defines this URL.
     *
     * Generated from protobuf field <code>optional string self_link = 456214797;</code>
     */
    private $self_link = null;
    /**
     * The source instance used to create the template. You can provide this as a partial or full URL to the resource. For example, the following are valid values: - https://www.googleapis.com/compute/v1/projects/project/zones/zone /instances/instance - projects/project/zones/zone/instances/instance 
     *
     * Generated from protobuf field <code>optional string source_instance = 396315705;</code>
     */
    private $source_instance = null;
    /**
     * The source instance params to use to create this instance template.
     *
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.SourceInstanceParams source_instance_params = 135342156;</code>
     */
    private $source_instance_params = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $creation_timestamp
     *           [Output Only] The creation timestamp for this instance template in RFC3339 text format.
     *     @type string $description
     *           An optional description of this resource. Provide this property when you create the resource.
     *     @type int|string $id
     *           [Output Only] A unique identifier for this instance template. The server defines this identifier.
     *     @type string $kind
     *           [Output Only] The resource type, which is always compute#instanceTemplate for instance templates.
     *     @type string $name
     *           Name of the resource; provided by the client when the resource is created. The name must be 1-63 characters long, and comply with RFC1035. Specifically, the name must be 1-63 characters long and match the regular expression `[a-z]([-a-z0-9]*[a-z0-9])?` which means the first character must be a lowercase letter, and all following characters must be a dash, lowercase letter, or digit, except the last character, which cannot be a dash.
     *     @type \Google\Cloud\Compute\V1\InstanceProperties $properties
     *           The instance properties for this instance template.
     *     @type string $region
     *           [Output Only] URL of the region where the instance template resides. Only applicable for regional resources.
     *     @type string $self_link
     *           [Output Only] The URL for this instance template. The server defines this URL.
     *     @type string $source_instance
     *           The source instance used to create the template. You can provide this as a partial or full URL to the resource. For example, the following are valid values: - https://www.googleapis.com/compute/v1/projects/project/zones/zone /instances/instance - projects/project/zones/zone/instances/instance 
     *     @type \Google\Cloud\Compute\V1\SourceInstanceParams $source_instance_params
     *           The source instance params to use to create this instance template.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * [Output Only] The creation timestamp for this instance template in RFC3339 text format.
     *
     * Generated from protobuf field <code>optional string creation_timestamp = 30525366;</code>
     * @return string
     */
    public function getCreationTimestamp()
    {
        return isset($this->creation_timestamp) ? $this->creation_timestamp : '';
    }

    public function hasCreationTimestamp()
    {
        return isset($this->creation_timestamp);
    }

    public function clearCreationTimestamp()
    {
        unset($this->creation_timestamp);
    }

    /**
     * [Output Only] The creation timestamp for this instance template in RFC3339 text format.
     *
     * Generated from protobuf field <code>optional string creation_timestamp = 30525366;</code>
     * @param string $var
     * @return $this
     */
    public function setCreationTimestamp($var)
    {
        GPBUtil::checkString($var, True);
        $this->creation_timestamp = $var;

        return $this;
    }

    /**
     * An optional description of this resource. Provide this property when you create the resource.
     *
     * Generated from protobuf field <code>optional string description = 422937596;</code>
     * @return string
     */
    public function getDescription()
    {
        return isset($this->description) ? $this->description : '';
    }

    public function hasDescription()
    {
        return isset($this->description);
    }

    public function clearDescription()
    {
        unset($this->description);
    }

    /**
     * An optional description of this resource. Provide this property when you create the resource.
     *
     * Generated from protobuf field <code>optional string description = 422937596;</code>
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
     * [Output Only] A unique identifier for this instance template. The server defines this identifier.
     *
     * Generated from protobuf field <code>optional uint64 id = 3355;</code>
     * @return int|string
     */
    public function getId()
    {
        return isset($this->id) ? $this->id : 0;
    }

    public function hasId()
    {
        return isset($this->id);
    }

    public function clearId()
    {
        unset($this->id);
    }

    /**
     * [Output Only] A unique identifier for this instance template. The server defines this identifier.
     *
     * Generated from protobuf field <code>optional uint64 id = 3355;</code>
     * @param int|string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkUint64($var);
        $this->id = $var;

        return $this;
    }

    /**
     * [Output Only] The resource type, which is always compute#instanceTemplate for instance templates.
     *
     * Generated from protobuf field <code>optional string kind = 3292052;</code>
     * @return string
     */
    public function getKind()
    {
        return isset($this->kind) ? $this->kind : '';
    }

    public function hasKind()
    {
        return isset($this->kind);
    }

    public function clearKind()
    {
        unset($this->kind);
    }

    /**
     * [Output Only] The resource type, which is always compute#instanceTemplate for instance templates.
     *
     * Generated from protobuf field <code>optional string kind = 3292052;</code>
     * @param string $var
     * @return $this
     */
    public function setKind($var)
    {
        GPBUtil::checkString($var, True);
        $this->kind = $var;

        return $this;
    }

    /**
     * Name of the resource; provided by the client when the resource is created. The name must be 1-63 characters long, and comply with RFC1035. Specifically, the name must be 1-63 characters long and match the regular expression `[a-z]([-a-z0-9]*[a-z0-9])?` which means the first character must be a lowercase letter, and all following characters must be a dash, lowercase letter, or digit, except the last character, which cannot be a dash.
     *
     * Generated from protobuf field <code>optional string name = 3373707;</code>
     * @return string
     */
    public function getName()
    {
        return isset($this->name) ? $this->name : '';
    }

    public function hasName()
    {
        return isset($this->name);
    }

    public function clearName()
    {
        unset($this->name);
    }

    /**
     * Name of the resource; provided by the client when the resource is created. The name must be 1-63 characters long, and comply with RFC1035. Specifically, the name must be 1-63 characters long and match the regular expression `[a-z]([-a-z0-9]*[a-z0-9])?` which means the first character must be a lowercase letter, and all following characters must be a dash, lowercase letter, or digit, except the last character, which cannot be a dash.
     *
     * Generated from protobuf field <code>optional string name = 3373707;</code>
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
     * The instance properties for this instance template.
     *
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.InstanceProperties properties = 147688755;</code>
     * @return \Google\Cloud\Compute\V1\InstanceProperties|null
     */
    public function getProperties()
    {
        return $this->properties;
    }

    public function hasProperties()
    {
        return isset($this->properties);
    }

    public function clearProperties()
    {
        unset($this->properties);
    }

    /**
     * The instance properties for this instance template.
     *
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.InstanceProperties properties = 147688755;</code>
     * @param \Google\Cloud\Compute\V1\InstanceProperties $var
     * @return $this
     */
    public function setProperties($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\InstanceProperties::class);
        $this->properties = $var;

        return $this;
    }

    /**
     * [Output Only] URL of the region where the instance template resides. Only applicable for regional resources.
     *
     * Generated from protobuf field <code>optional string region = 138946292;</code>
     * @return string
     */
    public function getRegion()
    {
        return isset($this->region) ? $this->region : '';
    }

    public function hasRegion()
    {
        return isset($this->region);
    }

    public function clearRegion()
    {
        unset($this->region);
    }

    /**
     * [Output Only] URL of the region where the instance template resides. Only applicable for regional resources.
     *
     * Generated from protobuf field <code>optional string region = 138946292;</code>
     * @param string $var
     * @return $this
     */
    public function setRegion($var)
    {
        GPBUtil::checkString($var, True);
        $this->region = $var;

        return $this;
    }

    /**
     * [Output Only] The URL for this instance template. The server defines this URL.
     *
     * Generated from protobuf field <code>optional string self_link = 456214797;</code>
     * @return string
     */
    public function getSelfLink()
    {
        return isset($this->self_link) ? $this->self_link : '';
    }

    public function hasSelfLink()
    {
        return isset($this->self_link);
    }

    public function clearSelfLink()
    {
        unset($this->self_link);
    }

    /**
     * [Output Only] The URL for this instance template. The server defines this URL.
     *
     * Generated from protobuf field <code>optional string self_link = 456214797;</code>
     * @param string $var
     * @return $this
     */
    public function setSelfLink($var)
    {
        GPBUtil::checkString($var, True);
        $this->self_link = $var;

        return $this;
    }

    /**
     * The source instance used to create the template. You can provide this as a partial or full URL to the resource. For example, the following are valid values: - https://www.googleapis.com/compute/v1/projects/project/zones/zone /instances/instance - projects/project/zones/zone/instances/instance 
     *
     * Generated from protobuf field <code>optional string source_instance = 396315705;</code>
     * @return string
     */
    public function getSourceInstance()
    {
        return isset($this->source_instance) ? $this->source_instance : '';
    }

    public function hasSourceInstance()
    {
        return isset($this->source_instance);
    }

    public function clearSourceInstance()
    {
        unset($this->source_instance);
    }

    /**
     * The source instance used to create the template. You can provide this as a partial or full URL to the resource. For example, the following are valid values: - https://www.googleapis.com/compute/v1/projects/project/zones/zone /instances/instance - projects/project/zones/zone/instances/instance 
     *
     * Generated from protobuf field <code>optional string source_instance = 396315705;</code>
     * @param string $var
     * @return $this
     */
    public function setSourceInstance($var)
    {
        GPBUtil::checkString($var, True);
        $this->source_instance = $var;

        return $this;
    }

    /**
     * The source instance params to use to create this instance template.
     *
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.SourceInstanceParams source_instance_params = 135342156;</code>
     * @return \Google\Cloud\Compute\V1\SourceInstanceParams|null
     */
    public function getSourceInstanceParams()
    {
        return $this->source_instance_params;
    }

    public function hasSourceInstanceParams()
    {
        return isset($this->source_instance_params);
    }

    public function clearSourceInstanceParams()
    {
        unset($this->source_instance_params);
    }

    /**
     * The source instance params to use to create this instance template.
     *
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.SourceInstanceParams source_instance_params = 135342156;</code>
     * @param \Google\Cloud\Compute\V1\SourceInstanceParams $var
     * @return $this
     */
    public function setSourceInstanceParams($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\SourceInstanceParams::class);
        $this->source_instance_params = $var;

        return $this;
    }

}

