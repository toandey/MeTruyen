<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/devtools/artifactregistry/v1/vpcsc_config.proto

namespace Google\Cloud\ArtifactRegistry\V1\VPCSCConfig;

use UnexpectedValueException;

/**
 * VPCSCPolicy is the VPC SC policy for project and location.
 *
 * Protobuf type <code>google.devtools.artifactregistry.v1.VPCSCConfig.VPCSCPolicy</code>
 */
class VPCSCPolicy
{
    /**
     * VPCSC_POLICY_UNSPECIFIED - the VPS SC policy is not defined.
     * When VPS SC policy is not defined - the Service will use the default
     * behavior (VPCSC_DENY).
     *
     * Generated from protobuf enum <code>VPCSC_POLICY_UNSPECIFIED = 0;</code>
     */
    const VPCSC_POLICY_UNSPECIFIED = 0;
    /**
     * VPCSC_DENY - repository will block the requests to the Upstreams for the
     * Remote Repositories if the resource is in the perimeter.
     *
     * Generated from protobuf enum <code>DENY = 1;</code>
     */
    const DENY = 1;
    /**
     * VPCSC_ALLOW - repository will allow the requests to the Upstreams for the
     * Remote Repositories if the resource is in the perimeter.
     *
     * Generated from protobuf enum <code>ALLOW = 2;</code>
     */
    const ALLOW = 2;

    private static $valueToName = [
        self::VPCSC_POLICY_UNSPECIFIED => 'VPCSC_POLICY_UNSPECIFIED',
        self::DENY => 'DENY',
        self::ALLOW => 'ALLOW',
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
class_alias(VPCSCPolicy::class, \Google\Cloud\ArtifactRegistry\V1\VPCSCConfig_VPCSCPolicy::class);

