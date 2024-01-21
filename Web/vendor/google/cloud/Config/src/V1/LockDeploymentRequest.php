<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/config/v1/config.proto

namespace Google\Cloud\Config\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A request to lock a deployment passed to a 'LockDeployment' call.
 *
 * Generated from protobuf message <code>google.cloud.config.v1.LockDeploymentRequest</code>
 */
class LockDeploymentRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The name of the deployment in the format:
     * 'projects/{project_id}/locations/{location}/deployments/{deployment}'.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    protected $name = '';

    /**
     * @param string $name Required. The name of the deployment in the format:
     *                     'projects/{project_id}/locations/{location}/deployments/{deployment}'. Please see
     *                     {@see ConfigClient::deploymentName()} for help formatting this field.
     *
     * @return \Google\Cloud\Config\V1\LockDeploymentRequest
     *
     * @experimental
     */
    public static function build(string $name): self
    {
        return (new self())
            ->setName($name);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Required. The name of the deployment in the format:
     *           'projects/{project_id}/locations/{location}/deployments/{deployment}'.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Config\V1\Config::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The name of the deployment in the format:
     * 'projects/{project_id}/locations/{location}/deployments/{deployment}'.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. The name of the deployment in the format:
     * 'projects/{project_id}/locations/{location}/deployments/{deployment}'.
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

}
