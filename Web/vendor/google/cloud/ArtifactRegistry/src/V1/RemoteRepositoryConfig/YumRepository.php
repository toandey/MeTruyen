<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/devtools/artifactregistry/v1/repository.proto

namespace Google\Cloud\ArtifactRegistry\V1\RemoteRepositoryConfig;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Configuration for a Yum remote repository.
 *
 * Generated from protobuf message <code>google.devtools.artifactregistry.v1.RemoteRepositoryConfig.YumRepository</code>
 */
class YumRepository extends \Google\Protobuf\Internal\Message
{
    protected $upstream;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\ArtifactRegistry\V1\RemoteRepositoryConfig\YumRepository\PublicRepository $public_repository
     *           One of the publicly available Yum repositories supported by Artifact
     *           Registry.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Devtools\Artifactregistry\V1\Repository::initOnce();
        parent::__construct($data);
    }

    /**
     * One of the publicly available Yum repositories supported by Artifact
     * Registry.
     *
     * Generated from protobuf field <code>.google.devtools.artifactregistry.v1.RemoteRepositoryConfig.YumRepository.PublicRepository public_repository = 1;</code>
     * @return \Google\Cloud\ArtifactRegistry\V1\RemoteRepositoryConfig\YumRepository\PublicRepository|null
     */
    public function getPublicRepository()
    {
        return $this->readOneof(1);
    }

    public function hasPublicRepository()
    {
        return $this->hasOneof(1);
    }

    /**
     * One of the publicly available Yum repositories supported by Artifact
     * Registry.
     *
     * Generated from protobuf field <code>.google.devtools.artifactregistry.v1.RemoteRepositoryConfig.YumRepository.PublicRepository public_repository = 1;</code>
     * @param \Google\Cloud\ArtifactRegistry\V1\RemoteRepositoryConfig\YumRepository\PublicRepository $var
     * @return $this
     */
    public function setPublicRepository($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\ArtifactRegistry\V1\RemoteRepositoryConfig\YumRepository\PublicRepository::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getUpstream()
    {
        return $this->whichOneof("upstream");
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(YumRepository::class, \Google\Cloud\ArtifactRegistry\V1\RemoteRepositoryConfig_YumRepository::class);
