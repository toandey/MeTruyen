<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/recaptchaenterprise/v1/recaptchaenterprise.proto

namespace Google\Cloud\RecaptchaEnterprise\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Policy config assessment.
 *
 * Generated from protobuf message <code>google.cloud.recaptchaenterprise.v1.FirewallPolicyAssessment</code>
 */
class FirewallPolicyAssessment extends \Google\Protobuf\Internal\Message
{
    /**
     * If the processing of a policy config fails, an error will be populated
     * and the firewall_policy will be left empty.
     *
     * Generated from protobuf field <code>.google.rpc.Status error = 5;</code>
     */
    private $error = null;
    /**
     * Output only. The policy that matched the request. If more than one policy
     * may match, this is the first match. If no policy matches the incoming
     * request, the policy field will be left empty.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.FirewallPolicy firewall_policy = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $firewall_policy = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Rpc\Status $error
     *           If the processing of a policy config fails, an error will be populated
     *           and the firewall_policy will be left empty.
     *     @type \Google\Cloud\RecaptchaEnterprise\V1\FirewallPolicy $firewall_policy
     *           Output only. The policy that matched the request. If more than one policy
     *           may match, this is the first match. If no policy matches the incoming
     *           request, the policy field will be left empty.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Recaptchaenterprise\V1\Recaptchaenterprise::initOnce();
        parent::__construct($data);
    }

    /**
     * If the processing of a policy config fails, an error will be populated
     * and the firewall_policy will be left empty.
     *
     * Generated from protobuf field <code>.google.rpc.Status error = 5;</code>
     * @return \Google\Rpc\Status|null
     */
    public function getError()
    {
        return $this->error;
    }

    public function hasError()
    {
        return isset($this->error);
    }

    public function clearError()
    {
        unset($this->error);
    }

    /**
     * If the processing of a policy config fails, an error will be populated
     * and the firewall_policy will be left empty.
     *
     * Generated from protobuf field <code>.google.rpc.Status error = 5;</code>
     * @param \Google\Rpc\Status $var
     * @return $this
     */
    public function setError($var)
    {
        GPBUtil::checkMessage($var, \Google\Rpc\Status::class);
        $this->error = $var;

        return $this;
    }

    /**
     * Output only. The policy that matched the request. If more than one policy
     * may match, this is the first match. If no policy matches the incoming
     * request, the policy field will be left empty.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.FirewallPolicy firewall_policy = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Cloud\RecaptchaEnterprise\V1\FirewallPolicy|null
     */
    public function getFirewallPolicy()
    {
        return $this->firewall_policy;
    }

    public function hasFirewallPolicy()
    {
        return isset($this->firewall_policy);
    }

    public function clearFirewallPolicy()
    {
        unset($this->firewall_policy);
    }

    /**
     * Output only. The policy that matched the request. If more than one policy
     * may match, this is the first match. If no policy matches the incoming
     * request, the policy field will be left empty.
     *
     * Generated from protobuf field <code>.google.cloud.recaptchaenterprise.v1.FirewallPolicy firewall_policy = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Cloud\RecaptchaEnterprise\V1\FirewallPolicy $var
     * @return $this
     */
    public function setFirewallPolicy($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\RecaptchaEnterprise\V1\FirewallPolicy::class);
        $this->firewall_policy = $var;

        return $this;
    }

}

