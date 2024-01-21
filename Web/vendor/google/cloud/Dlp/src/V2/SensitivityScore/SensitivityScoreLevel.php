<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/privacy/dlp/v2/storage.proto

namespace Google\Cloud\Dlp\V2\SensitivityScore;

use UnexpectedValueException;

/**
 * Various sensitivity score levels for resources.
 *
 * Protobuf type <code>google.privacy.dlp.v2.SensitivityScore.SensitivityScoreLevel</code>
 */
class SensitivityScoreLevel
{
    /**
     * Unused.
     *
     * Generated from protobuf enum <code>SENSITIVITY_SCORE_UNSPECIFIED = 0;</code>
     */
    const SENSITIVITY_SCORE_UNSPECIFIED = 0;
    /**
     * No sensitive information detected. The resource isn't publicly
     * accessible.
     *
     * Generated from protobuf enum <code>SENSITIVITY_LOW = 10;</code>
     */
    const SENSITIVITY_LOW = 10;
    /**
     * Medium risk. Contains personally identifiable information (PII),
     * potentially sensitive data, or fields with free-text data that are at a
     * higher risk of having intermittent sensitive data. Consider limiting
     * access.
     *
     * Generated from protobuf enum <code>SENSITIVITY_MODERATE = 20;</code>
     */
    const SENSITIVITY_MODERATE = 20;
    /**
     * High risk. Sensitive personally identifiable information (SPII) can be
     * present. Exfiltration of data can lead to user data loss.
     * Re-identification of users might be possible. Consider limiting usage and
     * or removing SPII.
     *
     * Generated from protobuf enum <code>SENSITIVITY_HIGH = 30;</code>
     */
    const SENSITIVITY_HIGH = 30;

    private static $valueToName = [
        self::SENSITIVITY_SCORE_UNSPECIFIED => 'SENSITIVITY_SCORE_UNSPECIFIED',
        self::SENSITIVITY_LOW => 'SENSITIVITY_LOW',
        self::SENSITIVITY_MODERATE => 'SENSITIVITY_MODERATE',
        self::SENSITIVITY_HIGH => 'SENSITIVITY_HIGH',
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
class_alias(SensitivityScoreLevel::class, \Google\Cloud\Dlp\V2\SensitivityScore_SensitivityScoreLevel::class);
