<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/websecurityscanner/v1/finding_type_stats.proto

namespace Google\Cloud\WebSecurityScanner\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A FindingTypeStats resource represents stats regarding a specific FindingType
 * of Findings under a given ScanRun.
 *
 * Generated from protobuf message <code>google.cloud.websecurityscanner.v1.FindingTypeStats</code>
 */
class FindingTypeStats extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The finding type associated with the stats.
     *
     * Generated from protobuf field <code>string finding_type = 1;</code>
     */
    private $finding_type = '';
    /**
     * Output only. The count of findings belonging to this finding type.
     *
     * Generated from protobuf field <code>int32 finding_count = 2;</code>
     */
    private $finding_count = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $finding_type
     *           Output only. The finding type associated with the stats.
     *     @type int $finding_count
     *           Output only. The count of findings belonging to this finding type.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Websecurityscanner\V1\FindingTypeStats::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The finding type associated with the stats.
     *
     * Generated from protobuf field <code>string finding_type = 1;</code>
     * @return string
     */
    public function getFindingType()
    {
        return $this->finding_type;
    }

    /**
     * Output only. The finding type associated with the stats.
     *
     * Generated from protobuf field <code>string finding_type = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setFindingType($var)
    {
        GPBUtil::checkString($var, True);
        $this->finding_type = $var;

        return $this;
    }

    /**
     * Output only. The count of findings belonging to this finding type.
     *
     * Generated from protobuf field <code>int32 finding_count = 2;</code>
     * @return int
     */
    public function getFindingCount()
    {
        return $this->finding_count;
    }

    /**
     * Output only. The count of findings belonging to this finding type.
     *
     * Generated from protobuf field <code>int32 finding_count = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setFindingCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->finding_count = $var;

        return $this;
    }

}

