<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/pipeline_job.proto

namespace Google\Cloud\AIPlatform\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The runtime detail of a pipeline executor.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.PipelineTaskExecutorDetail</code>
 */
class PipelineTaskExecutorDetail extends \Google\Protobuf\Internal\Message
{
    protected $details;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\AIPlatform\V1\PipelineTaskExecutorDetail\ContainerDetail $container_detail
     *           Output only. The detailed info for a container executor.
     *     @type \Google\Cloud\AIPlatform\V1\PipelineTaskExecutorDetail\CustomJobDetail $custom_job_detail
     *           Output only. The detailed info for a custom job executor.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\PipelineJob::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The detailed info for a container executor.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.PipelineTaskExecutorDetail.ContainerDetail container_detail = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Cloud\AIPlatform\V1\PipelineTaskExecutorDetail\ContainerDetail|null
     */
    public function getContainerDetail()
    {
        return $this->readOneof(1);
    }

    public function hasContainerDetail()
    {
        return $this->hasOneof(1);
    }

    /**
     * Output only. The detailed info for a container executor.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.PipelineTaskExecutorDetail.ContainerDetail container_detail = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Cloud\AIPlatform\V1\PipelineTaskExecutorDetail\ContainerDetail $var
     * @return $this
     */
    public function setContainerDetail($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AIPlatform\V1\PipelineTaskExecutorDetail\ContainerDetail::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Output only. The detailed info for a custom job executor.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.PipelineTaskExecutorDetail.CustomJobDetail custom_job_detail = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Cloud\AIPlatform\V1\PipelineTaskExecutorDetail\CustomJobDetail|null
     */
    public function getCustomJobDetail()
    {
        return $this->readOneof(2);
    }

    public function hasCustomJobDetail()
    {
        return $this->hasOneof(2);
    }

    /**
     * Output only. The detailed info for a custom job executor.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.PipelineTaskExecutorDetail.CustomJobDetail custom_job_detail = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Cloud\AIPlatform\V1\PipelineTaskExecutorDetail\CustomJobDetail $var
     * @return $this
     */
    public function setCustomJobDetail($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AIPlatform\V1\PipelineTaskExecutorDetail\CustomJobDetail::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getDetails()
    {
        return $this->whichOneof("details");
    }

}

