<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/binaryauthorization/v1/resources.proto

namespace Google\Cloud\BinaryAuthorization\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An [admission rule][google.cloud.binaryauthorization.v1.AdmissionRule] specifies either that all container images
 * used in a pod creation request must be attested to by one or more
 * [attestors][google.cloud.binaryauthorization.v1.Attestor], that all pod creations will be allowed, or that all
 * pod creations will be denied.
 * Images matching an [admission allowlist pattern][google.cloud.binaryauthorization.v1.AdmissionWhitelistPattern]
 * are exempted from admission rules and will never block a pod creation.
 *
 * Generated from protobuf message <code>google.cloud.binaryauthorization.v1.AdmissionRule</code>
 */
class AdmissionRule extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. How this admission rule will be evaluated.
     *
     * Generated from protobuf field <code>.google.cloud.binaryauthorization.v1.AdmissionRule.EvaluationMode evaluation_mode = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $evaluation_mode = 0;
    /**
     * Optional. The resource names of the attestors that must attest to
     * a container image, in the format `projects/&#42;&#47;attestors/&#42;`. Each
     * attestor must exist before a policy can reference it.  To add an attestor
     * to a policy the principal issuing the policy change request must be able
     * to read the attestor resource.
     * Note: this field must be non-empty when the evaluation_mode field specifies
     * REQUIRE_ATTESTATION, otherwise it must be empty.
     *
     * Generated from protobuf field <code>repeated string require_attestations_by = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $require_attestations_by;
    /**
     * Required. The action when a pod creation is denied by the admission rule.
     *
     * Generated from protobuf field <code>.google.cloud.binaryauthorization.v1.AdmissionRule.EnforcementMode enforcement_mode = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $enforcement_mode = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $evaluation_mode
     *           Required. How this admission rule will be evaluated.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $require_attestations_by
     *           Optional. The resource names of the attestors that must attest to
     *           a container image, in the format `projects/&#42;&#47;attestors/&#42;`. Each
     *           attestor must exist before a policy can reference it.  To add an attestor
     *           to a policy the principal issuing the policy change request must be able
     *           to read the attestor resource.
     *           Note: this field must be non-empty when the evaluation_mode field specifies
     *           REQUIRE_ATTESTATION, otherwise it must be empty.
     *     @type int $enforcement_mode
     *           Required. The action when a pod creation is denied by the admission rule.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Binaryauthorization\V1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. How this admission rule will be evaluated.
     *
     * Generated from protobuf field <code>.google.cloud.binaryauthorization.v1.AdmissionRule.EvaluationMode evaluation_mode = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getEvaluationMode()
    {
        return $this->evaluation_mode;
    }

    /**
     * Required. How this admission rule will be evaluated.
     *
     * Generated from protobuf field <code>.google.cloud.binaryauthorization.v1.AdmissionRule.EvaluationMode evaluation_mode = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setEvaluationMode($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\BinaryAuthorization\V1\AdmissionRule\EvaluationMode::class);
        $this->evaluation_mode = $var;

        return $this;
    }

    /**
     * Optional. The resource names of the attestors that must attest to
     * a container image, in the format `projects/&#42;&#47;attestors/&#42;`. Each
     * attestor must exist before a policy can reference it.  To add an attestor
     * to a policy the principal issuing the policy change request must be able
     * to read the attestor resource.
     * Note: this field must be non-empty when the evaluation_mode field specifies
     * REQUIRE_ATTESTATION, otherwise it must be empty.
     *
     * Generated from protobuf field <code>repeated string require_attestations_by = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRequireAttestationsBy()
    {
        return $this->require_attestations_by;
    }

    /**
     * Optional. The resource names of the attestors that must attest to
     * a container image, in the format `projects/&#42;&#47;attestors/&#42;`. Each
     * attestor must exist before a policy can reference it.  To add an attestor
     * to a policy the principal issuing the policy change request must be able
     * to read the attestor resource.
     * Note: this field must be non-empty when the evaluation_mode field specifies
     * REQUIRE_ATTESTATION, otherwise it must be empty.
     *
     * Generated from protobuf field <code>repeated string require_attestations_by = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRequireAttestationsBy($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->require_attestations_by = $arr;

        return $this;
    }

    /**
     * Required. The action when a pod creation is denied by the admission rule.
     *
     * Generated from protobuf field <code>.google.cloud.binaryauthorization.v1.AdmissionRule.EnforcementMode enforcement_mode = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getEnforcementMode()
    {
        return $this->enforcement_mode;
    }

    /**
     * Required. The action when a pod creation is denied by the admission rule.
     *
     * Generated from protobuf field <code>.google.cloud.binaryauthorization.v1.AdmissionRule.EnforcementMode enforcement_mode = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setEnforcementMode($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\BinaryAuthorization\V1\AdmissionRule\EnforcementMode::class);
        $this->enforcement_mode = $var;

        return $this;
    }

}

