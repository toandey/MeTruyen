<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents an SSL Policy resource. Use SSL policies to control the SSL features, such as versions and cipher suites, offered by an HTTPS or SSL Proxy load balancer. For more information, read SSL Policy Concepts.
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.SslPolicy</code>
 */
class SslPolicy extends \Google\Protobuf\Internal\Message
{
    /**
     * [Output Only] Creation timestamp in RFC3339 text format.
     *
     * Generated from protobuf field <code>optional string creation_timestamp = 30525366;</code>
     */
    private $creation_timestamp = null;
    /**
     * A list of features enabled when the selected profile is CUSTOM. The method returns the set of features that can be specified in this list. This field must be empty if the profile is not CUSTOM.
     *
     * Generated from protobuf field <code>repeated string custom_features = 34789707;</code>
     */
    private $custom_features;
    /**
     * An optional description of this resource. Provide this property when you create the resource.
     *
     * Generated from protobuf field <code>optional string description = 422937596;</code>
     */
    private $description = null;
    /**
     * [Output Only] The list of features enabled in the SSL policy.
     *
     * Generated from protobuf field <code>repeated string enabled_features = 469017467;</code>
     */
    private $enabled_features;
    /**
     * Fingerprint of this resource. A hash of the contents stored in this object. This field is used in optimistic locking. This field will be ignored when inserting a SslPolicy. An up-to-date fingerprint must be provided in order to update the SslPolicy, otherwise the request will fail with error 412 conditionNotMet. To see the latest fingerprint, make a get() request to retrieve an SslPolicy.
     *
     * Generated from protobuf field <code>optional string fingerprint = 234678500;</code>
     */
    private $fingerprint = null;
    /**
     * [Output Only] The unique identifier for the resource. This identifier is defined by the server.
     *
     * Generated from protobuf field <code>optional uint64 id = 3355;</code>
     */
    private $id = null;
    /**
     * [Output only] Type of the resource. Always compute#sslPolicyfor SSL policies.
     *
     * Generated from protobuf field <code>optional string kind = 3292052;</code>
     */
    private $kind = null;
    /**
     * The minimum version of SSL protocol that can be used by the clients to establish a connection with the load balancer. This can be one of TLS_1_0, TLS_1_1, TLS_1_2.
     * Check the MinTlsVersion enum for the list of possible values.
     *
     * Generated from protobuf field <code>optional string min_tls_version = 8155943;</code>
     */
    private $min_tls_version = null;
    /**
     * Name of the resource. The name must be 1-63 characters long, and comply with RFC1035. Specifically, the name must be 1-63 characters long and match the regular expression `[a-z]([-a-z0-9]*[a-z0-9])?` which means the first character must be a lowercase letter, and all following characters must be a dash, lowercase letter, or digit, except the last character, which cannot be a dash.
     *
     * Generated from protobuf field <code>optional string name = 3373707;</code>
     */
    private $name = null;
    /**
     * Profile specifies the set of SSL features that can be used by the load balancer when negotiating SSL with clients. This can be one of COMPATIBLE, MODERN, RESTRICTED, or CUSTOM. If using CUSTOM, the set of SSL features to enable must be specified in the customFeatures field.
     * Check the Profile enum for the list of possible values.
     *
     * Generated from protobuf field <code>optional string profile = 227445161;</code>
     */
    private $profile = null;
    /**
     * [Output Only] URL of the region where the regional SSL policy resides. This field is not applicable to global SSL policies.
     *
     * Generated from protobuf field <code>optional string region = 138946292;</code>
     */
    private $region = null;
    /**
     * [Output Only] Server-defined URL for the resource.
     *
     * Generated from protobuf field <code>optional string self_link = 456214797;</code>
     */
    private $self_link = null;
    /**
     * [Output Only] If potential misconfigurations are detected for this SSL policy, this field will be populated with warning messages.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.Warnings warnings = 498091095;</code>
     */
    private $warnings;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $creation_timestamp
     *           [Output Only] Creation timestamp in RFC3339 text format.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $custom_features
     *           A list of features enabled when the selected profile is CUSTOM. The method returns the set of features that can be specified in this list. This field must be empty if the profile is not CUSTOM.
     *     @type string $description
     *           An optional description of this resource. Provide this property when you create the resource.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $enabled_features
     *           [Output Only] The list of features enabled in the SSL policy.
     *     @type string $fingerprint
     *           Fingerprint of this resource. A hash of the contents stored in this object. This field is used in optimistic locking. This field will be ignored when inserting a SslPolicy. An up-to-date fingerprint must be provided in order to update the SslPolicy, otherwise the request will fail with error 412 conditionNotMet. To see the latest fingerprint, make a get() request to retrieve an SslPolicy.
     *     @type int|string $id
     *           [Output Only] The unique identifier for the resource. This identifier is defined by the server.
     *     @type string $kind
     *           [Output only] Type of the resource. Always compute#sslPolicyfor SSL policies.
     *     @type string $min_tls_version
     *           The minimum version of SSL protocol that can be used by the clients to establish a connection with the load balancer. This can be one of TLS_1_0, TLS_1_1, TLS_1_2.
     *           Check the MinTlsVersion enum for the list of possible values.
     *     @type string $name
     *           Name of the resource. The name must be 1-63 characters long, and comply with RFC1035. Specifically, the name must be 1-63 characters long and match the regular expression `[a-z]([-a-z0-9]*[a-z0-9])?` which means the first character must be a lowercase letter, and all following characters must be a dash, lowercase letter, or digit, except the last character, which cannot be a dash.
     *     @type string $profile
     *           Profile specifies the set of SSL features that can be used by the load balancer when negotiating SSL with clients. This can be one of COMPATIBLE, MODERN, RESTRICTED, or CUSTOM. If using CUSTOM, the set of SSL features to enable must be specified in the customFeatures field.
     *           Check the Profile enum for the list of possible values.
     *     @type string $region
     *           [Output Only] URL of the region where the regional SSL policy resides. This field is not applicable to global SSL policies.
     *     @type string $self_link
     *           [Output Only] Server-defined URL for the resource.
     *     @type array<\Google\Cloud\Compute\V1\Warnings>|\Google\Protobuf\Internal\RepeatedField $warnings
     *           [Output Only] If potential misconfigurations are detected for this SSL policy, this field will be populated with warning messages.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * [Output Only] Creation timestamp in RFC3339 text format.
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
     * [Output Only] Creation timestamp in RFC3339 text format.
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
     * A list of features enabled when the selected profile is CUSTOM. The method returns the set of features that can be specified in this list. This field must be empty if the profile is not CUSTOM.
     *
     * Generated from protobuf field <code>repeated string custom_features = 34789707;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCustomFeatures()
    {
        return $this->custom_features;
    }

    /**
     * A list of features enabled when the selected profile is CUSTOM. The method returns the set of features that can be specified in this list. This field must be empty if the profile is not CUSTOM.
     *
     * Generated from protobuf field <code>repeated string custom_features = 34789707;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCustomFeatures($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->custom_features = $arr;

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
     * [Output Only] The list of features enabled in the SSL policy.
     *
     * Generated from protobuf field <code>repeated string enabled_features = 469017467;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getEnabledFeatures()
    {
        return $this->enabled_features;
    }

    /**
     * [Output Only] The list of features enabled in the SSL policy.
     *
     * Generated from protobuf field <code>repeated string enabled_features = 469017467;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setEnabledFeatures($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->enabled_features = $arr;

        return $this;
    }

    /**
     * Fingerprint of this resource. A hash of the contents stored in this object. This field is used in optimistic locking. This field will be ignored when inserting a SslPolicy. An up-to-date fingerprint must be provided in order to update the SslPolicy, otherwise the request will fail with error 412 conditionNotMet. To see the latest fingerprint, make a get() request to retrieve an SslPolicy.
     *
     * Generated from protobuf field <code>optional string fingerprint = 234678500;</code>
     * @return string
     */
    public function getFingerprint()
    {
        return isset($this->fingerprint) ? $this->fingerprint : '';
    }

    public function hasFingerprint()
    {
        return isset($this->fingerprint);
    }

    public function clearFingerprint()
    {
        unset($this->fingerprint);
    }

    /**
     * Fingerprint of this resource. A hash of the contents stored in this object. This field is used in optimistic locking. This field will be ignored when inserting a SslPolicy. An up-to-date fingerprint must be provided in order to update the SslPolicy, otherwise the request will fail with error 412 conditionNotMet. To see the latest fingerprint, make a get() request to retrieve an SslPolicy.
     *
     * Generated from protobuf field <code>optional string fingerprint = 234678500;</code>
     * @param string $var
     * @return $this
     */
    public function setFingerprint($var)
    {
        GPBUtil::checkString($var, True);
        $this->fingerprint = $var;

        return $this;
    }

    /**
     * [Output Only] The unique identifier for the resource. This identifier is defined by the server.
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
     * [Output Only] The unique identifier for the resource. This identifier is defined by the server.
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
     * [Output only] Type of the resource. Always compute#sslPolicyfor SSL policies.
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
     * [Output only] Type of the resource. Always compute#sslPolicyfor SSL policies.
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
     * The minimum version of SSL protocol that can be used by the clients to establish a connection with the load balancer. This can be one of TLS_1_0, TLS_1_1, TLS_1_2.
     * Check the MinTlsVersion enum for the list of possible values.
     *
     * Generated from protobuf field <code>optional string min_tls_version = 8155943;</code>
     * @return string
     */
    public function getMinTlsVersion()
    {
        return isset($this->min_tls_version) ? $this->min_tls_version : '';
    }

    public function hasMinTlsVersion()
    {
        return isset($this->min_tls_version);
    }

    public function clearMinTlsVersion()
    {
        unset($this->min_tls_version);
    }

    /**
     * The minimum version of SSL protocol that can be used by the clients to establish a connection with the load balancer. This can be one of TLS_1_0, TLS_1_1, TLS_1_2.
     * Check the MinTlsVersion enum for the list of possible values.
     *
     * Generated from protobuf field <code>optional string min_tls_version = 8155943;</code>
     * @param string $var
     * @return $this
     */
    public function setMinTlsVersion($var)
    {
        GPBUtil::checkString($var, True);
        $this->min_tls_version = $var;

        return $this;
    }

    /**
     * Name of the resource. The name must be 1-63 characters long, and comply with RFC1035. Specifically, the name must be 1-63 characters long and match the regular expression `[a-z]([-a-z0-9]*[a-z0-9])?` which means the first character must be a lowercase letter, and all following characters must be a dash, lowercase letter, or digit, except the last character, which cannot be a dash.
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
     * Name of the resource. The name must be 1-63 characters long, and comply with RFC1035. Specifically, the name must be 1-63 characters long and match the regular expression `[a-z]([-a-z0-9]*[a-z0-9])?` which means the first character must be a lowercase letter, and all following characters must be a dash, lowercase letter, or digit, except the last character, which cannot be a dash.
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
     * Profile specifies the set of SSL features that can be used by the load balancer when negotiating SSL with clients. This can be one of COMPATIBLE, MODERN, RESTRICTED, or CUSTOM. If using CUSTOM, the set of SSL features to enable must be specified in the customFeatures field.
     * Check the Profile enum for the list of possible values.
     *
     * Generated from protobuf field <code>optional string profile = 227445161;</code>
     * @return string
     */
    public function getProfile()
    {
        return isset($this->profile) ? $this->profile : '';
    }

    public function hasProfile()
    {
        return isset($this->profile);
    }

    public function clearProfile()
    {
        unset($this->profile);
    }

    /**
     * Profile specifies the set of SSL features that can be used by the load balancer when negotiating SSL with clients. This can be one of COMPATIBLE, MODERN, RESTRICTED, or CUSTOM. If using CUSTOM, the set of SSL features to enable must be specified in the customFeatures field.
     * Check the Profile enum for the list of possible values.
     *
     * Generated from protobuf field <code>optional string profile = 227445161;</code>
     * @param string $var
     * @return $this
     */
    public function setProfile($var)
    {
        GPBUtil::checkString($var, True);
        $this->profile = $var;

        return $this;
    }

    /**
     * [Output Only] URL of the region where the regional SSL policy resides. This field is not applicable to global SSL policies.
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
     * [Output Only] URL of the region where the regional SSL policy resides. This field is not applicable to global SSL policies.
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
     * [Output Only] Server-defined URL for the resource.
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
     * [Output Only] Server-defined URL for the resource.
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
     * [Output Only] If potential misconfigurations are detected for this SSL policy, this field will be populated with warning messages.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.Warnings warnings = 498091095;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getWarnings()
    {
        return $this->warnings;
    }

    /**
     * [Output Only] If potential misconfigurations are detected for this SSL policy, this field will be populated with warning messages.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.Warnings warnings = 498091095;</code>
     * @param array<\Google\Cloud\Compute\V1\Warnings>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setWarnings($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Compute\V1\Warnings::class);
        $this->warnings = $arr;

        return $this;
    }

}

