<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/analytics/admin/v1alpha/subproperty_event_filter.proto

namespace Google\Analytics\Admin\V1alpha\SubpropertyEventFilterClause;

use UnexpectedValueException;

/**
 * Specifies whether this is an include or exclude filter clause.
 *
 * Protobuf type <code>google.analytics.admin.v1alpha.SubpropertyEventFilterClause.FilterClauseType</code>
 */
class FilterClauseType
{
    /**
     * Filter clause type unknown or not specified.
     *
     * Generated from protobuf enum <code>FILTER_CLAUSE_TYPE_UNSPECIFIED = 0;</code>
     */
    const FILTER_CLAUSE_TYPE_UNSPECIFIED = 0;
    /**
     * Events will be included in the Sub property if the filter clause is met.
     *
     * Generated from protobuf enum <code>INCLUDE = 1;</code>
     */
    const PBINCLUDE = 1;
    /**
     * Events will be excluded from the Sub property if the filter clause is
     * met.
     *
     * Generated from protobuf enum <code>EXCLUDE = 2;</code>
     */
    const EXCLUDE = 2;

    private static $valueToName = [
        self::FILTER_CLAUSE_TYPE_UNSPECIFIED => 'FILTER_CLAUSE_TYPE_UNSPECIFIED',
        self::PBINCLUDE => 'INCLUDE',
        self::EXCLUDE => 'EXCLUDE',
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
            $pbconst =  __CLASS__. '::PB' . strtoupper($name);
            if (!defined($pbconst)) {
                throw new UnexpectedValueException(sprintf(
                        'Enum %s has no value defined for name %s', __CLASS__, $name));
            }
            return constant($pbconst);
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FilterClauseType::class, \Google\Analytics\Admin\V1alpha\SubpropertyEventFilterClause_FilterClauseType::class);
