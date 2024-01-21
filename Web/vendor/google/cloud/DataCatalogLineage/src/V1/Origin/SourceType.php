<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/datacatalog/lineage/v1/lineage.proto

namespace Google\Cloud\DataCatalog\Lineage\V1\Origin;

use UnexpectedValueException;

/**
 * Type of the source of a process.
 *
 * Protobuf type <code>google.cloud.datacatalog.lineage.v1.Origin.SourceType</code>
 */
class SourceType
{
    /**
     * Source is Unspecified
     *
     * Generated from protobuf enum <code>SOURCE_TYPE_UNSPECIFIED = 0;</code>
     */
    const SOURCE_TYPE_UNSPECIFIED = 0;
    /**
     * A custom source
     *
     * Generated from protobuf enum <code>CUSTOM = 1;</code>
     */
    const CUSTOM = 1;
    /**
     * BigQuery
     *
     * Generated from protobuf enum <code>BIGQUERY = 2;</code>
     */
    const BIGQUERY = 2;
    /**
     * Data Fusion
     *
     * Generated from protobuf enum <code>DATA_FUSION = 3;</code>
     */
    const DATA_FUSION = 3;
    /**
     * Composer
     *
     * Generated from protobuf enum <code>COMPOSER = 4;</code>
     */
    const COMPOSER = 4;
    /**
     * Looker Studio
     *
     * Generated from protobuf enum <code>LOOKER_STUDIO = 5;</code>
     */
    const LOOKER_STUDIO = 5;

    private static $valueToName = [
        self::SOURCE_TYPE_UNSPECIFIED => 'SOURCE_TYPE_UNSPECIFIED',
        self::CUSTOM => 'CUSTOM',
        self::BIGQUERY => 'BIGQUERY',
        self::DATA_FUSION => 'DATA_FUSION',
        self::COMPOSER => 'COMPOSER',
        self::LOOKER_STUDIO => 'LOOKER_STUDIO',
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


