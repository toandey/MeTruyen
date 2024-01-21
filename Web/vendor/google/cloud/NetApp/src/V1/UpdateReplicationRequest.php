<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/netapp/v1/replication.proto

namespace Google\Cloud\NetApp\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * UpdateReplicationRequest updates description and/or labels for a replication.
 *
 * Generated from protobuf message <code>google.cloud.netapp.v1.UpdateReplicationRequest</code>
 */
class UpdateReplicationRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Mask of fields to update.  At least one path must be supplied in
     * this field.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $update_mask = null;
    /**
     * Required. A replication resource
     *
     * Generated from protobuf field <code>.google.cloud.netapp.v1.Replication replication = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    protected $replication = null;

    /**
     * @param \Google\Cloud\NetApp\V1\Replication $replication Required. A replication resource
     * @param \Google\Protobuf\FieldMask          $updateMask  Required. Mask of fields to update.  At least one path must be supplied in
     *                                                         this field.
     *
     * @return \Google\Cloud\NetApp\V1\UpdateReplicationRequest
     *
     * @experimental
     */
    public static function build(\Google\Cloud\NetApp\V1\Replication $replication, \Google\Protobuf\FieldMask $updateMask): self
    {
        return (new self())
            ->setReplication($replication)
            ->setUpdateMask($updateMask);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Protobuf\FieldMask $update_mask
     *           Required. Mask of fields to update.  At least one path must be supplied in
     *           this field.
     *     @type \Google\Cloud\NetApp\V1\Replication $replication
     *           Required. A replication resource
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Netapp\V1\Replication::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Mask of fields to update.  At least one path must be supplied in
     * this field.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\FieldMask|null
     */
    public function getUpdateMask()
    {
        return $this->update_mask;
    }

    public function hasUpdateMask()
    {
        return isset($this->update_mask);
    }

    public function clearUpdateMask()
    {
        unset($this->update_mask);
    }

    /**
     * Required. Mask of fields to update.  At least one path must be supplied in
     * this field.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Protobuf\FieldMask $var
     * @return $this
     */
    public function setUpdateMask($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\FieldMask::class);
        $this->update_mask = $var;

        return $this;
    }

    /**
     * Required. A replication resource
     *
     * Generated from protobuf field <code>.google.cloud.netapp.v1.Replication replication = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\NetApp\V1\Replication|null
     */
    public function getReplication()
    {
        return $this->replication;
    }

    public function hasReplication()
    {
        return isset($this->replication);
    }

    public function clearReplication()
    {
        unset($this->replication);
    }

    /**
     * Required. A replication resource
     *
     * Generated from protobuf field <code>.google.cloud.netapp.v1.Replication replication = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\NetApp\V1\Replication $var
     * @return $this
     */
    public function setReplication($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\NetApp\V1\Replication::class);
        $this->replication = $var;

        return $this;
    }

}
