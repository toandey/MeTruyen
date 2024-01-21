<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dataplex/v1/logs.proto

namespace Google\Cloud\Dataplex\V1\DataScanEvent;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Applied configs for data profile type data scan job.
 *
 * Generated from protobuf message <code>google.cloud.dataplex.v1.DataScanEvent.DataProfileAppliedConfigs</code>
 */
class DataProfileAppliedConfigs extends \Google\Protobuf\Internal\Message
{
    /**
     * The percentage of the records selected from the dataset for DataScan.
     * * Value ranges between 0.0 and 100.0.
     * * Value 0.0 or 100.0 imply that sampling was not applied.
     *
     * Generated from protobuf field <code>float sampling_percent = 1;</code>
     */
    private $sampling_percent = 0.0;
    /**
     * Boolean indicating whether a row filter was applied in the DataScan job.
     *
     * Generated from protobuf field <code>bool row_filter_applied = 2;</code>
     */
    private $row_filter_applied = false;
    /**
     * Boolean indicating whether a column filter was applied in the DataScan
     * job.
     *
     * Generated from protobuf field <code>bool column_filter_applied = 3;</code>
     */
    private $column_filter_applied = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type float $sampling_percent
     *           The percentage of the records selected from the dataset for DataScan.
     *           * Value ranges between 0.0 and 100.0.
     *           * Value 0.0 or 100.0 imply that sampling was not applied.
     *     @type bool $row_filter_applied
     *           Boolean indicating whether a row filter was applied in the DataScan job.
     *     @type bool $column_filter_applied
     *           Boolean indicating whether a column filter was applied in the DataScan
     *           job.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dataplex\V1\Logs::initOnce();
        parent::__construct($data);
    }

    /**
     * The percentage of the records selected from the dataset for DataScan.
     * * Value ranges between 0.0 and 100.0.
     * * Value 0.0 or 100.0 imply that sampling was not applied.
     *
     * Generated from protobuf field <code>float sampling_percent = 1;</code>
     * @return float
     */
    public function getSamplingPercent()
    {
        return $this->sampling_percent;
    }

    /**
     * The percentage of the records selected from the dataset for DataScan.
     * * Value ranges between 0.0 and 100.0.
     * * Value 0.0 or 100.0 imply that sampling was not applied.
     *
     * Generated from protobuf field <code>float sampling_percent = 1;</code>
     * @param float $var
     * @return $this
     */
    public function setSamplingPercent($var)
    {
        GPBUtil::checkFloat($var);
        $this->sampling_percent = $var;

        return $this;
    }

    /**
     * Boolean indicating whether a row filter was applied in the DataScan job.
     *
     * Generated from protobuf field <code>bool row_filter_applied = 2;</code>
     * @return bool
     */
    public function getRowFilterApplied()
    {
        return $this->row_filter_applied;
    }

    /**
     * Boolean indicating whether a row filter was applied in the DataScan job.
     *
     * Generated from protobuf field <code>bool row_filter_applied = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setRowFilterApplied($var)
    {
        GPBUtil::checkBool($var);
        $this->row_filter_applied = $var;

        return $this;
    }

    /**
     * Boolean indicating whether a column filter was applied in the DataScan
     * job.
     *
     * Generated from protobuf field <code>bool column_filter_applied = 3;</code>
     * @return bool
     */
    public function getColumnFilterApplied()
    {
        return $this->column_filter_applied;
    }

    /**
     * Boolean indicating whether a column filter was applied in the DataScan
     * job.
     *
     * Generated from protobuf field <code>bool column_filter_applied = 3;</code>
     * @param bool $var
     * @return $this
     */
    public function setColumnFilterApplied($var)
    {
        GPBUtil::checkBool($var);
        $this->column_filter_applied = $var;

        return $this;
    }

}


