<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/shell/v1/cloudshell.proto

namespace Google\Cloud\Shell\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Cloud Shell environment, which is defined as the combination of a Docker
 * image specifying what is installed on the environment and a home directory
 * containing the user's data that will remain across sessions. Each user has
 * at least an environment with the ID "default".
 *
 * Generated from protobuf message <code>google.cloud.shell.v1.Environment</code>
 */
class Environment extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. Full name of this resource, in the format
     * `users/{owner_email}/environments/{environment_id}`. `{owner_email}` is the
     * email address of the user to whom this environment belongs, and
     * `{environment_id}` is the identifier of this environment. For example,
     * `users/someone&#64;example.com/environments/default`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $name = '';
    /**
     * Output only. The environment's identifier, unique among the user's
     * environments.
     *
     * Generated from protobuf field <code>string id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $id = '';
    /**
     * Required. Immutable. Full path to the Docker image used to run this environment, e.g.
     * "gcr.io/dev-con/cloud-devshell:latest".
     *
     * Generated from protobuf field <code>string docker_image = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $docker_image = '';
    /**
     * Output only. Current execution state of this environment.
     *
     * Generated from protobuf field <code>.google.cloud.shell.v1.Environment.State state = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $state = 0;
    /**
     * Output only. Host to which clients can connect to initiate HTTPS or WSS
     * connections with the environment.
     *
     * Generated from protobuf field <code>string web_host = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $web_host = '';
    /**
     * Output only. Username that clients should use when initiating SSH sessions
     * with the environment.
     *
     * Generated from protobuf field <code>string ssh_username = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $ssh_username = '';
    /**
     * Output only. Host to which clients can connect to initiate SSH sessions
     * with the environment.
     *
     * Generated from protobuf field <code>string ssh_host = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $ssh_host = '';
    /**
     * Output only. Port to which clients can connect to initiate SSH sessions
     * with the environment.
     *
     * Generated from protobuf field <code>int32 ssh_port = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $ssh_port = 0;
    /**
     * Output only. Public keys associated with the environment. Clients can
     * connect to this environment via SSH only if they possess a private key
     * corresponding to at least one of these public keys. Keys can be added to or
     * removed from the environment using the AddPublicKey and RemovePublicKey
     * methods.
     *
     * Generated from protobuf field <code>repeated string public_keys = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $public_keys;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Immutable. Full name of this resource, in the format
     *           `users/{owner_email}/environments/{environment_id}`. `{owner_email}` is the
     *           email address of the user to whom this environment belongs, and
     *           `{environment_id}` is the identifier of this environment. For example,
     *           `users/someone&#64;example.com/environments/default`.
     *     @type string $id
     *           Output only. The environment's identifier, unique among the user's
     *           environments.
     *     @type string $docker_image
     *           Required. Immutable. Full path to the Docker image used to run this environment, e.g.
     *           "gcr.io/dev-con/cloud-devshell:latest".
     *     @type int $state
     *           Output only. Current execution state of this environment.
     *     @type string $web_host
     *           Output only. Host to which clients can connect to initiate HTTPS or WSS
     *           connections with the environment.
     *     @type string $ssh_username
     *           Output only. Username that clients should use when initiating SSH sessions
     *           with the environment.
     *     @type string $ssh_host
     *           Output only. Host to which clients can connect to initiate SSH sessions
     *           with the environment.
     *     @type int $ssh_port
     *           Output only. Port to which clients can connect to initiate SSH sessions
     *           with the environment.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $public_keys
     *           Output only. Public keys associated with the environment. Clients can
     *           connect to this environment via SSH only if they possess a private key
     *           corresponding to at least one of these public keys. Keys can be added to or
     *           removed from the environment using the AddPublicKey and RemovePublicKey
     *           methods.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Shell\V1\Cloudshell::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. Full name of this resource, in the format
     * `users/{owner_email}/environments/{environment_id}`. `{owner_email}` is the
     * email address of the user to whom this environment belongs, and
     * `{environment_id}` is the identifier of this environment. For example,
     * `users/someone&#64;example.com/environments/default`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Immutable. Full name of this resource, in the format
     * `users/{owner_email}/environments/{environment_id}`. `{owner_email}` is the
     * email address of the user to whom this environment belongs, and
     * `{environment_id}` is the identifier of this environment. For example,
     * `users/someone&#64;example.com/environments/default`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Output only. The environment's identifier, unique among the user's
     * environments.
     *
     * Generated from protobuf field <code>string id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Output only. The environment's identifier, unique among the user's
     * environments.
     *
     * Generated from protobuf field <code>string id = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkString($var, True);
        $this->id = $var;

        return $this;
    }

    /**
     * Required. Immutable. Full path to the Docker image used to run this environment, e.g.
     * "gcr.io/dev-con/cloud-devshell:latest".
     *
     * Generated from protobuf field <code>string docker_image = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getDockerImage()
    {
        return $this->docker_image;
    }

    /**
     * Required. Immutable. Full path to the Docker image used to run this environment, e.g.
     * "gcr.io/dev-con/cloud-devshell:latest".
     *
     * Generated from protobuf field <code>string docker_image = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @param string $var
     * @return $this
     */
    public function setDockerImage($var)
    {
        GPBUtil::checkString($var, True);
        $this->docker_image = $var;

        return $this;
    }

    /**
     * Output only. Current execution state of this environment.
     *
     * Generated from protobuf field <code>.google.cloud.shell.v1.Environment.State state = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Output only. Current execution state of this environment.
     *
     * Generated from protobuf field <code>.google.cloud.shell.v1.Environment.State state = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Shell\V1\Environment\State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * Output only. Host to which clients can connect to initiate HTTPS or WSS
     * connections with the environment.
     *
     * Generated from protobuf field <code>string web_host = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getWebHost()
    {
        return $this->web_host;
    }

    /**
     * Output only. Host to which clients can connect to initiate HTTPS or WSS
     * connections with the environment.
     *
     * Generated from protobuf field <code>string web_host = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setWebHost($var)
    {
        GPBUtil::checkString($var, True);
        $this->web_host = $var;

        return $this;
    }

    /**
     * Output only. Username that clients should use when initiating SSH sessions
     * with the environment.
     *
     * Generated from protobuf field <code>string ssh_username = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getSshUsername()
    {
        return $this->ssh_username;
    }

    /**
     * Output only. Username that clients should use when initiating SSH sessions
     * with the environment.
     *
     * Generated from protobuf field <code>string ssh_username = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setSshUsername($var)
    {
        GPBUtil::checkString($var, True);
        $this->ssh_username = $var;

        return $this;
    }

    /**
     * Output only. Host to which clients can connect to initiate SSH sessions
     * with the environment.
     *
     * Generated from protobuf field <code>string ssh_host = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getSshHost()
    {
        return $this->ssh_host;
    }

    /**
     * Output only. Host to which clients can connect to initiate SSH sessions
     * with the environment.
     *
     * Generated from protobuf field <code>string ssh_host = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setSshHost($var)
    {
        GPBUtil::checkString($var, True);
        $this->ssh_host = $var;

        return $this;
    }

    /**
     * Output only. Port to which clients can connect to initiate SSH sessions
     * with the environment.
     *
     * Generated from protobuf field <code>int32 ssh_port = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getSshPort()
    {
        return $this->ssh_port;
    }

    /**
     * Output only. Port to which clients can connect to initiate SSH sessions
     * with the environment.
     *
     * Generated from protobuf field <code>int32 ssh_port = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setSshPort($var)
    {
        GPBUtil::checkInt32($var);
        $this->ssh_port = $var;

        return $this;
    }

    /**
     * Output only. Public keys associated with the environment. Clients can
     * connect to this environment via SSH only if they possess a private key
     * corresponding to at least one of these public keys. Keys can be added to or
     * removed from the environment using the AddPublicKey and RemovePublicKey
     * methods.
     *
     * Generated from protobuf field <code>repeated string public_keys = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getPublicKeys()
    {
        return $this->public_keys;
    }

    /**
     * Output only. Public keys associated with the environment. Clients can
     * connect to this environment via SSH only if they possess a private key
     * corresponding to at least one of these public keys. Keys can be added to or
     * removed from the environment using the AddPublicKey and RemovePublicKey
     * methods.
     *
     * Generated from protobuf field <code>repeated string public_keys = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setPublicKeys($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->public_keys = $arr;

        return $this;
    }

}
