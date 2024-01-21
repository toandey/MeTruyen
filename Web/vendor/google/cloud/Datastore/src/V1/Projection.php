<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/datastore/v1/query.proto

namespace Google\Cloud\Datastore\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A representation of a property in a projection.
 *
 * Generated from protobuf message <code>google.datastore.v1.Projection</code>
 */
class Projection extends \Google\Protobuf\Internal\Message
{
    /**
     * The property to project.
     *
     * Generated from protobuf field <code>.google.datastore.v1.PropertyReference property = 1;</code>
     */
    private $property = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Datastore\V1\PropertyReference $property
     *           The property to project.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Datastore\V1\Query::initOnce();
        parent::__construct($data);
    }

    /**
     * The property to project.
     *
     * Generated from protobuf field <code>.google.datastore.v1.PropertyReference property = 1;</code>
     * @return \Google\Cloud\Datastore\V1\PropertyReference|null
     */
    public function getProperty()
    {
        return $this->property;
    }

    public function hasProperty()
    {
        return isset($this->property);
    }

    public function clearProperty()
    {
        unset($this->property);
    }

    /**
     * The property to project.
     *
     * Generated from protobuf field <code>.google.datastore.v1.PropertyReference property = 1;</code>
     * @param \Google\Cloud\Datastore\V1\PropertyReference $var
     * @return $this
     */
    public function setProperty($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Datastore\V1\PropertyReference::class);
        $this->property = $var;

        return $this;
    }

}

