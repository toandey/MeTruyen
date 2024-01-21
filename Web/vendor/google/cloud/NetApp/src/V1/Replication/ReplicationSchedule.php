<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/netapp/v1/replication.proto

namespace Google\Cloud\NetApp\V1\Replication;

use UnexpectedValueException;

/**
 * Schedule for Replication.
 * New enum values may be added in future to support different frequency of
 * replication.
 *
 * Protobuf type <code>google.cloud.netapp.v1.Replication.ReplicationSchedule</code>
 */
class ReplicationSchedule
{
    /**
     * Unspecified ReplicationSchedule
     *
     * Generated from protobuf enum <code>REPLICATION_SCHEDULE_UNSPECIFIED = 0;</code>
     */
    const REPLICATION_SCHEDULE_UNSPECIFIED = 0;
    /**
     * Replication happens once every 10 minutes.
     *
     * Generated from protobuf enum <code>EVERY_10_MINUTES = 1;</code>
     */
    const EVERY_10_MINUTES = 1;
    /**
     * Replication happens once every hour.
     *
     * Generated from protobuf enum <code>HOURLY = 2;</code>
     */
    const HOURLY = 2;
    /**
     * Replication happens once every day.
     *
     * Generated from protobuf enum <code>DAILY = 3;</code>
     */
    const DAILY = 3;

    private static $valueToName = [
        self::REPLICATION_SCHEDULE_UNSPECIFIED => 'REPLICATION_SCHEDULE_UNSPECIFIED',
        self::EVERY_10_MINUTES => 'EVERY_10_MINUTES',
        self::HOURLY => 'HOURLY',
        self::DAILY => 'DAILY',
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

