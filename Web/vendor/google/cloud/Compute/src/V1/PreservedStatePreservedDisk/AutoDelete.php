<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1\PreservedStatePreservedDisk;

use UnexpectedValueException;

/**
 * These stateful disks will never be deleted during autohealing, update, instance recreate operations. This flag is used to configure if the disk should be deleted after it is no longer used by the group, e.g. when the given instance or the whole MIG is deleted. Note: disks attached in READ_ONLY mode cannot be auto-deleted.
 *
 * Protobuf type <code>google.cloud.compute.v1.PreservedStatePreservedDisk.AutoDelete</code>
 */
class AutoDelete
{
    /**
     * A value indicating that the enum field is not set.
     *
     * Generated from protobuf enum <code>UNDEFINED_AUTO_DELETE = 0;</code>
     */
    const UNDEFINED_AUTO_DELETE = 0;
    /**
     * Generated from protobuf enum <code>NEVER = 74175084;</code>
     */
    const NEVER = 74175084;
    /**
     * Generated from protobuf enum <code>ON_PERMANENT_INSTANCE_DELETION = 95727719;</code>
     */
    const ON_PERMANENT_INSTANCE_DELETION = 95727719;

    private static $valueToName = [
        self::UNDEFINED_AUTO_DELETE => 'UNDEFINED_AUTO_DELETE',
        self::NEVER => 'NEVER',
        self::ON_PERMANENT_INSTANCE_DELETION => 'ON_PERMANENT_INSTANCE_DELETION',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}


