<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dataplex/v1/logs.proto

namespace Google\Cloud\Dataplex\V1\DataQualityScanRuleResult;

use UnexpectedValueException;

/**
 * The type of the data quality rule.
 *
 * Protobuf type <code>google.cloud.dataplex.v1.DataQualityScanRuleResult.RuleType</code>
 */
class RuleType
{
    /**
     * An unspecified rule type.
     *
     * Generated from protobuf enum <code>RULE_TYPE_UNSPECIFIED = 0;</code>
     */
    const RULE_TYPE_UNSPECIFIED = 0;
    /**
     * Please see
     * https://cloud.google.com/dataplex/docs/reference/rest/v1/DataQualityRule#nonnullexpectation.
     *
     * Generated from protobuf enum <code>NON_NULL_EXPECTATION = 1;</code>
     */
    const NON_NULL_EXPECTATION = 1;
    /**
     * Please see
     * https://cloud.google.com/dataplex/docs/reference/rest/v1/DataQualityRule#rangeexpectation.
     *
     * Generated from protobuf enum <code>RANGE_EXPECTATION = 2;</code>
     */
    const RANGE_EXPECTATION = 2;
    /**
     * Please see
     * https://cloud.google.com/dataplex/docs/reference/rest/v1/DataQualityRule#regexexpectation.
     *
     * Generated from protobuf enum <code>REGEX_EXPECTATION = 3;</code>
     */
    const REGEX_EXPECTATION = 3;
    /**
     * Please see
     * https://cloud.google.com/dataplex/docs/reference/rest/v1/DataQualityRule#rowconditionexpectation.
     *
     * Generated from protobuf enum <code>ROW_CONDITION_EXPECTATION = 4;</code>
     */
    const ROW_CONDITION_EXPECTATION = 4;
    /**
     * Please see
     * https://cloud.google.com/dataplex/docs/reference/rest/v1/DataQualityRule#setexpectation.
     *
     * Generated from protobuf enum <code>SET_EXPECTATION = 5;</code>
     */
    const SET_EXPECTATION = 5;
    /**
     * Please see
     * https://cloud.google.com/dataplex/docs/reference/rest/v1/DataQualityRule#statisticrangeexpectation.
     *
     * Generated from protobuf enum <code>STATISTIC_RANGE_EXPECTATION = 6;</code>
     */
    const STATISTIC_RANGE_EXPECTATION = 6;
    /**
     * Please see
     * https://cloud.google.com/dataplex/docs/reference/rest/v1/DataQualityRule#tableconditionexpectation.
     *
     * Generated from protobuf enum <code>TABLE_CONDITION_EXPECTATION = 7;</code>
     */
    const TABLE_CONDITION_EXPECTATION = 7;
    /**
     * Please see
     * https://cloud.google.com/dataplex/docs/reference/rest/v1/DataQualityRule#uniquenessexpectation.
     *
     * Generated from protobuf enum <code>UNIQUENESS_EXPECTATION = 8;</code>
     */
    const UNIQUENESS_EXPECTATION = 8;

    private static $valueToName = [
        self::RULE_TYPE_UNSPECIFIED => 'RULE_TYPE_UNSPECIFIED',
        self::NON_NULL_EXPECTATION => 'NON_NULL_EXPECTATION',
        self::RANGE_EXPECTATION => 'RANGE_EXPECTATION',
        self::REGEX_EXPECTATION => 'REGEX_EXPECTATION',
        self::ROW_CONDITION_EXPECTATION => 'ROW_CONDITION_EXPECTATION',
        self::SET_EXPECTATION => 'SET_EXPECTATION',
        self::STATISTIC_RANGE_EXPECTATION => 'STATISTIC_RANGE_EXPECTATION',
        self::TABLE_CONDITION_EXPECTATION => 'TABLE_CONDITION_EXPECTATION',
        self::UNIQUENESS_EXPECTATION => 'UNIQUENESS_EXPECTATION',
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

