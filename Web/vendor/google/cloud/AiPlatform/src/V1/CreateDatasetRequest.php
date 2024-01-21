<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/dataset_service.proto

namespace Google\Cloud\AIPlatform\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [DatasetService.CreateDataset][google.cloud.aiplatform.v1.DatasetService.CreateDataset].
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.CreateDatasetRequest</code>
 */
class CreateDatasetRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The resource name of the Location to create the Dataset in.
     * Format: `projects/{project}/locations/{location}`
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Required. The Dataset to create.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.Dataset dataset = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $dataset = null;

    /**
     * @param string                              $parent  Required. The resource name of the Location to create the Dataset in.
     *                                                     Format: `projects/{project}/locations/{location}`
     *                                                     Please see {@see DatasetServiceClient::locationName()} for help formatting this field.
     * @param \Google\Cloud\AIPlatform\V1\Dataset $dataset Required. The Dataset to create.
     *
     * @return \Google\Cloud\AIPlatform\V1\CreateDatasetRequest
     *
     * @experimental
     */
    public static function build(string $parent, \Google\Cloud\AIPlatform\V1\Dataset $dataset): self
    {
        return (new self())
            ->setParent($parent)
            ->setDataset($dataset);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. The resource name of the Location to create the Dataset in.
     *           Format: `projects/{project}/locations/{location}`
     *     @type \Google\Cloud\AIPlatform\V1\Dataset $dataset
     *           Required. The Dataset to create.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\DatasetService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The resource name of the Location to create the Dataset in.
     * Format: `projects/{project}/locations/{location}`
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. The resource name of the Location to create the Dataset in.
     * Format: `projects/{project}/locations/{location}`
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
     * Required. The Dataset to create.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.Dataset dataset = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\AIPlatform\V1\Dataset|null
     */
    public function getDataset()
    {
        return $this->dataset;
    }

    public function hasDataset()
    {
        return isset($this->dataset);
    }

    public function clearDataset()
    {
        unset($this->dataset);
    }

    /**
     * Required. The Dataset to create.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.Dataset dataset = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\AIPlatform\V1\Dataset $var
     * @return $this
     */
    public function setDataset($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AIPlatform\V1\Dataset::class);
        $this->dataset = $var;

        return $this;
    }

}

