<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/gkebackup/v1/backup.proto

namespace Google\Cloud\GkeBackup\V1\Backup;

use UnexpectedValueException;

/**
 * State
 *
 * Protobuf type <code>google.cloud.gkebackup.v1.Backup.State</code>
 */
class State
{
    /**
     * The Backup resource is in the process of being created.
     *
     * Generated from protobuf enum <code>STATE_UNSPECIFIED = 0;</code>
     */
    const STATE_UNSPECIFIED = 0;
    /**
     * The Backup resource has been created and the associated BackupJob
     * Kubernetes resource has been injected into the source cluster.
     *
     * Generated from protobuf enum <code>CREATING = 1;</code>
     */
    const CREATING = 1;
    /**
     * The gkebackup agent in the cluster has begun executing the backup
     * operation.
     *
     * Generated from protobuf enum <code>IN_PROGRESS = 2;</code>
     */
    const IN_PROGRESS = 2;
    /**
     * The backup operation has completed successfully.
     *
     * Generated from protobuf enum <code>SUCCEEDED = 3;</code>
     */
    const SUCCEEDED = 3;
    /**
     * The backup operation has failed.
     *
     * Generated from protobuf enum <code>FAILED = 4;</code>
     */
    const FAILED = 4;
    /**
     * This Backup resource (and its associated artifacts) is in the process
     * of being deleted.
     *
     * Generated from protobuf enum <code>DELETING = 5;</code>
     */
    const DELETING = 5;

    private static $valueToName = [
        self::STATE_UNSPECIFIED => 'STATE_UNSPECIFIED',
        self::CREATING => 'CREATING',
        self::IN_PROGRESS => 'IN_PROGRESS',
        self::SUCCEEDED => 'SUCCEEDED',
        self::FAILED => 'FAILED',
        self::DELETING => 'DELETING',
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


