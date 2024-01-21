<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/audit/bigquery_audit_metadata.proto

namespace Google\Cloud\Audit\BigQueryAuditMetadata\ModelDeletion;

use UnexpectedValueException;

/**
 * Describes how the model was deleted.
 *
 * Protobuf type <code>google.cloud.audit.BigQueryAuditMetadata.ModelDeletion.Reason</code>
 */
class Reason
{
    /**
     * Unknown.
     *
     * Generated from protobuf enum <code>REASON_UNSPECIFIED = 0;</code>
     */
    const REASON_UNSPECIFIED = 0;
    /**
     * Model was deleted using the models.delete API.
     *
     * Generated from protobuf enum <code>MODEL_DELETE_REQUEST = 1;</code>
     */
    const MODEL_DELETE_REQUEST = 1;
    /**
     * Model expired.
     *
     * Generated from protobuf enum <code>EXPIRED = 2;</code>
     */
    const EXPIRED = 2;
    /**
     * Model was deleted using DDL query.
     *
     * Generated from protobuf enum <code>QUERY = 3;</code>
     */
    const QUERY = 3;

    private static $valueToName = [
        self::REASON_UNSPECIFIED => 'REASON_UNSPECIFIED',
        self::MODEL_DELETE_REQUEST => 'MODEL_DELETE_REQUEST',
        self::EXPIRED => 'EXPIRED',
        self::QUERY => 'QUERY',
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


