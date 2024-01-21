<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/video/livestream/v1/resources.proto

namespace Google\Cloud\Video\LiveStream\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Encryption settings.
 *
 * Generated from protobuf message <code>google.cloud.video.livestream.v1.Encryption</code>
 */
class Encryption extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Identifier for this set of encryption options.
     *
     * Generated from protobuf field <code>string id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $id = '';
    /**
     * Required. Configuration for DRM systems.
     *
     * Generated from protobuf field <code>.google.cloud.video.livestream.v1.Encryption.DrmSystems drm_systems = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $drm_systems = null;
    protected $secret_source;
    protected $encryption_mode;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $id
     *           Required. Identifier for this set of encryption options.
     *     @type \Google\Cloud\Video\LiveStream\V1\Encryption\SecretManagerSource $secret_manager_key_source
     *           For keys stored in Google Secret Manager.
     *     @type \Google\Cloud\Video\LiveStream\V1\Encryption\DrmSystems $drm_systems
     *           Required. Configuration for DRM systems.
     *     @type \Google\Cloud\Video\LiveStream\V1\Encryption\Aes128Encryption $aes128
     *           Configuration for HLS AES-128 encryption.
     *     @type \Google\Cloud\Video\LiveStream\V1\Encryption\SampleAesEncryption $sample_aes
     *           Configuration for HLS SAMPLE-AES encryption.
     *     @type \Google\Cloud\Video\LiveStream\V1\Encryption\MpegCommonEncryption $mpeg_cenc
     *           Configuration for MPEG-Dash Common Encryption (MPEG-CENC).
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Video\Livestream\V1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Identifier for this set of encryption options.
     *
     * Generated from protobuf field <code>string id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Required. Identifier for this set of encryption options.
     *
     * Generated from protobuf field <code>string id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
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
     * For keys stored in Google Secret Manager.
     *
     * Generated from protobuf field <code>.google.cloud.video.livestream.v1.Encryption.SecretManagerSource secret_manager_key_source = 7;</code>
     * @return \Google\Cloud\Video\LiveStream\V1\Encryption\SecretManagerSource|null
     */
    public function getSecretManagerKeySource()
    {
        return $this->readOneof(7);
    }

    public function hasSecretManagerKeySource()
    {
        return $this->hasOneof(7);
    }

    /**
     * For keys stored in Google Secret Manager.
     *
     * Generated from protobuf field <code>.google.cloud.video.livestream.v1.Encryption.SecretManagerSource secret_manager_key_source = 7;</code>
     * @param \Google\Cloud\Video\LiveStream\V1\Encryption\SecretManagerSource $var
     * @return $this
     */
    public function setSecretManagerKeySource($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Video\LiveStream\V1\Encryption\SecretManagerSource::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * Required. Configuration for DRM systems.
     *
     * Generated from protobuf field <code>.google.cloud.video.livestream.v1.Encryption.DrmSystems drm_systems = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Video\LiveStream\V1\Encryption\DrmSystems|null
     */
    public function getDrmSystems()
    {
        return $this->drm_systems;
    }

    public function hasDrmSystems()
    {
        return isset($this->drm_systems);
    }

    public function clearDrmSystems()
    {
        unset($this->drm_systems);
    }

    /**
     * Required. Configuration for DRM systems.
     *
     * Generated from protobuf field <code>.google.cloud.video.livestream.v1.Encryption.DrmSystems drm_systems = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Video\LiveStream\V1\Encryption\DrmSystems $var
     * @return $this
     */
    public function setDrmSystems($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Video\LiveStream\V1\Encryption\DrmSystems::class);
        $this->drm_systems = $var;

        return $this;
    }

    /**
     * Configuration for HLS AES-128 encryption.
     *
     * Generated from protobuf field <code>.google.cloud.video.livestream.v1.Encryption.Aes128Encryption aes128 = 4;</code>
     * @return \Google\Cloud\Video\LiveStream\V1\Encryption\Aes128Encryption|null
     */
    public function getAes128()
    {
        return $this->readOneof(4);
    }

    public function hasAes128()
    {
        return $this->hasOneof(4);
    }

    /**
     * Configuration for HLS AES-128 encryption.
     *
     * Generated from protobuf field <code>.google.cloud.video.livestream.v1.Encryption.Aes128Encryption aes128 = 4;</code>
     * @param \Google\Cloud\Video\LiveStream\V1\Encryption\Aes128Encryption $var
     * @return $this
     */
    public function setAes128($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Video\LiveStream\V1\Encryption\Aes128Encryption::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Configuration for HLS SAMPLE-AES encryption.
     *
     * Generated from protobuf field <code>.google.cloud.video.livestream.v1.Encryption.SampleAesEncryption sample_aes = 5;</code>
     * @return \Google\Cloud\Video\LiveStream\V1\Encryption\SampleAesEncryption|null
     */
    public function getSampleAes()
    {
        return $this->readOneof(5);
    }

    public function hasSampleAes()
    {
        return $this->hasOneof(5);
    }

    /**
     * Configuration for HLS SAMPLE-AES encryption.
     *
     * Generated from protobuf field <code>.google.cloud.video.livestream.v1.Encryption.SampleAesEncryption sample_aes = 5;</code>
     * @param \Google\Cloud\Video\LiveStream\V1\Encryption\SampleAesEncryption $var
     * @return $this
     */
    public function setSampleAes($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Video\LiveStream\V1\Encryption\SampleAesEncryption::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * Configuration for MPEG-Dash Common Encryption (MPEG-CENC).
     *
     * Generated from protobuf field <code>.google.cloud.video.livestream.v1.Encryption.MpegCommonEncryption mpeg_cenc = 6;</code>
     * @return \Google\Cloud\Video\LiveStream\V1\Encryption\MpegCommonEncryption|null
     */
    public function getMpegCenc()
    {
        return $this->readOneof(6);
    }

    public function hasMpegCenc()
    {
        return $this->hasOneof(6);
    }

    /**
     * Configuration for MPEG-Dash Common Encryption (MPEG-CENC).
     *
     * Generated from protobuf field <code>.google.cloud.video.livestream.v1.Encryption.MpegCommonEncryption mpeg_cenc = 6;</code>
     * @param \Google\Cloud\Video\LiveStream\V1\Encryption\MpegCommonEncryption $var
     * @return $this
     */
    public function setMpegCenc($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Video\LiveStream\V1\Encryption\MpegCommonEncryption::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getSecretSource()
    {
        return $this->whichOneof("secret_source");
    }

    /**
     * @return string
     */
    public function getEncryptionMode()
    {
        return $this->whichOneof("encryption_mode");
    }

}

