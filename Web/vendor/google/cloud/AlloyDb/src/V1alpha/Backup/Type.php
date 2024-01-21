<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/alloydb/v1alpha/resources.proto

namespace Google\Cloud\AlloyDb\V1alpha\Backup;

use UnexpectedValueException;

/**
 * Backup Type
 *
 * Protobuf type <code>google.cloud.alloydb.v1alpha.Backup.Type</code>
 */
class Type
{
    /**
     * Backup Type is unknown.
     *
     * Generated from protobuf enum <code>TYPE_UNSPECIFIED = 0;</code>
     */
    const TYPE_UNSPECIFIED = 0;
    /**
     * ON_DEMAND backups that were triggered by the customer (e.g., not
     * AUTOMATED).
     *
     * Generated from protobuf enum <code>ON_DEMAND = 1;</code>
     */
    const ON_DEMAND = 1;
    /**
     * AUTOMATED backups triggered by the automated backups scheduler pursuant
     * to an automated backup policy.
     *
     * Generated from protobuf enum <code>AUTOMATED = 2;</code>
     */
    const AUTOMATED = 2;
    /**
     * CONTINUOUS backups triggered by the automated backups scheduler
     * due to a continuous backup policy.
     *
     * Generated from protobuf enum <code>CONTINUOUS = 3;</code>
     */
    const CONTINUOUS = 3;

    private static $valueToName = [
        self::TYPE_UNSPECIFIED => 'TYPE_UNSPECIFIED',
        self::ON_DEMAND => 'ON_DEMAND',
        self::AUTOMATED => 'AUTOMATED',
        self::CONTINUOUS => 'CONTINUOUS',
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


