<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/alloydb/v1beta/resources.proto

namespace Google\Cloud\AlloyDb\V1beta\Instance;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * MachineConfig describes the configuration of a machine.
 *
 * Generated from protobuf message <code>google.cloud.alloydb.v1beta.Instance.MachineConfig</code>
 */
class MachineConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * The number of CPU's in the VM instance.
     *
     * Generated from protobuf field <code>int32 cpu_count = 1;</code>
     */
    protected $cpu_count = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $cpu_count
     *           The number of CPU's in the VM instance.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Alloydb\V1Beta\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * The number of CPU's in the VM instance.
     *
     * Generated from protobuf field <code>int32 cpu_count = 1;</code>
     * @return int
     */
    public function getCpuCount()
    {
        return $this->cpu_count;
    }

    /**
     * The number of CPU's in the VM instance.
     *
     * Generated from protobuf field <code>int32 cpu_count = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setCpuCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->cpu_count = $var;

        return $this;
    }

}


