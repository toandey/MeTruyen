<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/securitycenter/v1/vulnerability.proto

namespace Google\Cloud\SecurityCenter\V1\Cvssv3;

use UnexpectedValueException;

/**
 * This metric describes the conditions beyond the attacker's control that
 * must exist in order to exploit the vulnerability.
 *
 * Protobuf type <code>google.cloud.securitycenter.v1.Cvssv3.AttackComplexity</code>
 */
class AttackComplexity
{
    /**
     * Invalid value.
     *
     * Generated from protobuf enum <code>ATTACK_COMPLEXITY_UNSPECIFIED = 0;</code>
     */
    const ATTACK_COMPLEXITY_UNSPECIFIED = 0;
    /**
     * Specialized access conditions or extenuating circumstances do not exist.
     * An attacker can expect repeatable success when attacking the vulnerable
     * component.
     *
     * Generated from protobuf enum <code>ATTACK_COMPLEXITY_LOW = 1;</code>
     */
    const ATTACK_COMPLEXITY_LOW = 1;
    /**
     * A successful attack depends on conditions beyond the attacker's control.
     * That is, a successful attack cannot be accomplished at will, but requires
     * the attacker to invest in some measurable amount of effort in preparation
     * or execution against the vulnerable component before a successful attack
     * can be expected.
     *
     * Generated from protobuf enum <code>ATTACK_COMPLEXITY_HIGH = 2;</code>
     */
    const ATTACK_COMPLEXITY_HIGH = 2;

    private static $valueToName = [
        self::ATTACK_COMPLEXITY_UNSPECIFIED => 'ATTACK_COMPLEXITY_UNSPECIFIED',
        self::ATTACK_COMPLEXITY_LOW => 'ATTACK_COMPLEXITY_LOW',
        self::ATTACK_COMPLEXITY_HIGH => 'ATTACK_COMPLEXITY_HIGH',
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AttackComplexity::class, \Google\Cloud\SecurityCenter\V1\Cvssv3_AttackComplexity::class);

