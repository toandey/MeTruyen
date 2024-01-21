<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/audit/bigquery_audit_metadata.proto

namespace Google\Cloud\Audit\BigQueryAuditMetadata;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Model data change event.
 *
 * Generated from protobuf message <code>google.cloud.audit.BigQueryAuditMetadata.ModelDataChange</code>
 */
class ModelDataChange extends \Google\Protobuf\Internal\Message
{
    /**
     * Describes how the model data was changed.
     *
     * Generated from protobuf field <code>.google.cloud.audit.BigQueryAuditMetadata.ModelDataChange.Reason reason = 1;</code>
     */
    protected $reason = 0;
    /**
     * The URI of the job that changed the model data.
     * Format: `projects/<project_id>/jobs/<job_id>`.
     *
     * Generated from protobuf field <code>string job_name = 2;</code>
     */
    protected $job_name = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $reason
     *           Describes how the model data was changed.
     *     @type string $job_name
     *           The URI of the job that changed the model data.
     *           Format: `projects/<project_id>/jobs/<job_id>`.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Audit\BigqueryAuditMetadata::initOnce();
        parent::__construct($data);
    }

    /**
     * Describes how the model data was changed.
     *
     * Generated from protobuf field <code>.google.cloud.audit.BigQueryAuditMetadata.ModelDataChange.Reason reason = 1;</code>
     * @return int
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Describes how the model data was changed.
     *
     * Generated from protobuf field <code>.google.cloud.audit.BigQueryAuditMetadata.ModelDataChange.Reason reason = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setReason($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Audit\BigQueryAuditMetadata\ModelDataChange\Reason::class);
        $this->reason = $var;

        return $this;
    }

    /**
     * The URI of the job that changed the model data.
     * Format: `projects/<project_id>/jobs/<job_id>`.
     *
     * Generated from protobuf field <code>string job_name = 2;</code>
     * @return string
     */
    public function getJobName()
    {
        return $this->job_name;
    }

    /**
     * The URI of the job that changed the model data.
     * Format: `projects/<project_id>/jobs/<job_id>`.
     *
     * Generated from protobuf field <code>string job_name = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setJobName($var)
    {
        GPBUtil::checkString($var, True);
        $this->job_name = $var;

        return $this;
    }

}

