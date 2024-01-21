<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/speech/v2/cloud_speech.proto

namespace Google\Cloud\Speech\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for the
 * [BatchRecognize][google.cloud.speech.v2.Speech.BatchRecognize]
 * method.
 *
 * Generated from protobuf message <code>google.cloud.speech.v2.BatchRecognizeRequest</code>
 */
class BatchRecognizeRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The name of the Recognizer to use during recognition. The
     * expected format is
     * `projects/{project}/locations/{location}/recognizers/{recognizer}`. The
     * {recognizer} segment may be set to `_` to use an empty implicit Recognizer.
     *
     * Generated from protobuf field <code>string recognizer = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $recognizer = '';
    /**
     * Features and audio metadata to use for the Automatic Speech Recognition.
     * This field in combination with the
     * [config_mask][google.cloud.speech.v2.BatchRecognizeRequest.config_mask]
     * field can be used to override parts of the
     * [default_recognition_config][google.cloud.speech.v2.Recognizer.default_recognition_config]
     * of the Recognizer resource.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v2.RecognitionConfig config = 4;</code>
     */
    private $config = null;
    /**
     * The list of fields in
     * [config][google.cloud.speech.v2.BatchRecognizeRequest.config] that override
     * the values in the
     * [default_recognition_config][google.cloud.speech.v2.Recognizer.default_recognition_config]
     * of the recognizer during this recognition request. If no mask is provided,
     * all given fields in
     * [config][google.cloud.speech.v2.BatchRecognizeRequest.config] override the
     * values in the recognizer for this recognition request. If a mask is
     * provided, only the fields listed in the mask override the config in the
     * recognizer for this recognition request. If a wildcard (`*`) is provided,
     * [config][google.cloud.speech.v2.BatchRecognizeRequest.config] completely
     * overrides and replaces the config in the recognizer for this recognition
     * request.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask config_mask = 5;</code>
     */
    private $config_mask = null;
    /**
     * Audio files with file metadata for ASR.
     * The maximum number of files allowed to be specified is 5.
     *
     * Generated from protobuf field <code>repeated .google.cloud.speech.v2.BatchRecognizeFileMetadata files = 3;</code>
     */
    private $files;
    /**
     * Configuration options for where to output the transcripts of each file.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v2.RecognitionOutputConfig recognition_output_config = 6;</code>
     */
    private $recognition_output_config = null;
    /**
     * Processing strategy to use for this request.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v2.BatchRecognizeRequest.ProcessingStrategy processing_strategy = 7;</code>
     */
    private $processing_strategy = 0;

    /**
     * @param string                                               $recognizer Required. The name of the Recognizer to use during recognition. The
     *                                                                         expected format is
     *                                                                         `projects/{project}/locations/{location}/recognizers/{recognizer}`. The
     *                                                                         {recognizer} segment may be set to `_` to use an empty implicit Recognizer. Please see
     *                                                                         {@see SpeechClient::recognizerName()} for help formatting this field.
     * @param \Google\Cloud\Speech\V2\RecognitionConfig            $config     Features and audio metadata to use for the Automatic Speech Recognition.
     *                                                                         This field in combination with the
     *                                                                         [config_mask][google.cloud.speech.v2.BatchRecognizeRequest.config_mask]
     *                                                                         field can be used to override parts of the
     *                                                                         [default_recognition_config][google.cloud.speech.v2.Recognizer.default_recognition_config]
     *                                                                         of the Recognizer resource.
     * @param \Google\Protobuf\FieldMask                           $configMask The list of fields in
     *                                                                         [config][google.cloud.speech.v2.BatchRecognizeRequest.config] that override
     *                                                                         the values in the
     *                                                                         [default_recognition_config][google.cloud.speech.v2.Recognizer.default_recognition_config]
     *                                                                         of the recognizer during this recognition request. If no mask is provided,
     *                                                                         all given fields in
     *                                                                         [config][google.cloud.speech.v2.BatchRecognizeRequest.config] override the
     *                                                                         values in the recognizer for this recognition request. If a mask is
     *                                                                         provided, only the fields listed in the mask override the config in the
     *                                                                         recognizer for this recognition request. If a wildcard (`*`) is provided,
     *                                                                         [config][google.cloud.speech.v2.BatchRecognizeRequest.config] completely
     *                                                                         overrides and replaces the config in the recognizer for this recognition
     *                                                                         request.
     * @param \Google\Cloud\Speech\V2\BatchRecognizeFileMetadata[] $files      Audio files with file metadata for ASR.
     *                                                                         The maximum number of files allowed to be specified is 5.
     *
     * @return \Google\Cloud\Speech\V2\BatchRecognizeRequest
     *
     * @experimental
     */
    public static function build(string $recognizer, \Google\Cloud\Speech\V2\RecognitionConfig $config, \Google\Protobuf\FieldMask $configMask, array $files): self
    {
        return (new self())
            ->setRecognizer($recognizer)
            ->setConfig($config)
            ->setConfigMask($configMask)
            ->setFiles($files);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $recognizer
     *           Required. The name of the Recognizer to use during recognition. The
     *           expected format is
     *           `projects/{project}/locations/{location}/recognizers/{recognizer}`. The
     *           {recognizer} segment may be set to `_` to use an empty implicit Recognizer.
     *     @type \Google\Cloud\Speech\V2\RecognitionConfig $config
     *           Features and audio metadata to use for the Automatic Speech Recognition.
     *           This field in combination with the
     *           [config_mask][google.cloud.speech.v2.BatchRecognizeRequest.config_mask]
     *           field can be used to override parts of the
     *           [default_recognition_config][google.cloud.speech.v2.Recognizer.default_recognition_config]
     *           of the Recognizer resource.
     *     @type \Google\Protobuf\FieldMask $config_mask
     *           The list of fields in
     *           [config][google.cloud.speech.v2.BatchRecognizeRequest.config] that override
     *           the values in the
     *           [default_recognition_config][google.cloud.speech.v2.Recognizer.default_recognition_config]
     *           of the recognizer during this recognition request. If no mask is provided,
     *           all given fields in
     *           [config][google.cloud.speech.v2.BatchRecognizeRequest.config] override the
     *           values in the recognizer for this recognition request. If a mask is
     *           provided, only the fields listed in the mask override the config in the
     *           recognizer for this recognition request. If a wildcard (`*`) is provided,
     *           [config][google.cloud.speech.v2.BatchRecognizeRequest.config] completely
     *           overrides and replaces the config in the recognizer for this recognition
     *           request.
     *     @type array<\Google\Cloud\Speech\V2\BatchRecognizeFileMetadata>|\Google\Protobuf\Internal\RepeatedField $files
     *           Audio files with file metadata for ASR.
     *           The maximum number of files allowed to be specified is 5.
     *     @type \Google\Cloud\Speech\V2\RecognitionOutputConfig $recognition_output_config
     *           Configuration options for where to output the transcripts of each file.
     *     @type int $processing_strategy
     *           Processing strategy to use for this request.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Speech\V2\CloudSpeech::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The name of the Recognizer to use during recognition. The
     * expected format is
     * `projects/{project}/locations/{location}/recognizers/{recognizer}`. The
     * {recognizer} segment may be set to `_` to use an empty implicit Recognizer.
     *
     * Generated from protobuf field <code>string recognizer = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getRecognizer()
    {
        return $this->recognizer;
    }

    /**
     * Required. The name of the Recognizer to use during recognition. The
     * expected format is
     * `projects/{project}/locations/{location}/recognizers/{recognizer}`. The
     * {recognizer} segment may be set to `_` to use an empty implicit Recognizer.
     *
     * Generated from protobuf field <code>string recognizer = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setRecognizer($var)
    {
        GPBUtil::checkString($var, True);
        $this->recognizer = $var;

        return $this;
    }

    /**
     * Features and audio metadata to use for the Automatic Speech Recognition.
     * This field in combination with the
     * [config_mask][google.cloud.speech.v2.BatchRecognizeRequest.config_mask]
     * field can be used to override parts of the
     * [default_recognition_config][google.cloud.speech.v2.Recognizer.default_recognition_config]
     * of the Recognizer resource.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v2.RecognitionConfig config = 4;</code>
     * @return \Google\Cloud\Speech\V2\RecognitionConfig|null
     */
    public function getConfig()
    {
        return $this->config;
    }

    public function hasConfig()
    {
        return isset($this->config);
    }

    public function clearConfig()
    {
        unset($this->config);
    }

    /**
     * Features and audio metadata to use for the Automatic Speech Recognition.
     * This field in combination with the
     * [config_mask][google.cloud.speech.v2.BatchRecognizeRequest.config_mask]
     * field can be used to override parts of the
     * [default_recognition_config][google.cloud.speech.v2.Recognizer.default_recognition_config]
     * of the Recognizer resource.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v2.RecognitionConfig config = 4;</code>
     * @param \Google\Cloud\Speech\V2\RecognitionConfig $var
     * @return $this
     */
    public function setConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Speech\V2\RecognitionConfig::class);
        $this->config = $var;

        return $this;
    }

    /**
     * The list of fields in
     * [config][google.cloud.speech.v2.BatchRecognizeRequest.config] that override
     * the values in the
     * [default_recognition_config][google.cloud.speech.v2.Recognizer.default_recognition_config]
     * of the recognizer during this recognition request. If no mask is provided,
     * all given fields in
     * [config][google.cloud.speech.v2.BatchRecognizeRequest.config] override the
     * values in the recognizer for this recognition request. If a mask is
     * provided, only the fields listed in the mask override the config in the
     * recognizer for this recognition request. If a wildcard (`*`) is provided,
     * [config][google.cloud.speech.v2.BatchRecognizeRequest.config] completely
     * overrides and replaces the config in the recognizer for this recognition
     * request.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask config_mask = 5;</code>
     * @return \Google\Protobuf\FieldMask|null
     */
    public function getConfigMask()
    {
        return $this->config_mask;
    }

    public function hasConfigMask()
    {
        return isset($this->config_mask);
    }

    public function clearConfigMask()
    {
        unset($this->config_mask);
    }

    /**
     * The list of fields in
     * [config][google.cloud.speech.v2.BatchRecognizeRequest.config] that override
     * the values in the
     * [default_recognition_config][google.cloud.speech.v2.Recognizer.default_recognition_config]
     * of the recognizer during this recognition request. If no mask is provided,
     * all given fields in
     * [config][google.cloud.speech.v2.BatchRecognizeRequest.config] override the
     * values in the recognizer for this recognition request. If a mask is
     * provided, only the fields listed in the mask override the config in the
     * recognizer for this recognition request. If a wildcard (`*`) is provided,
     * [config][google.cloud.speech.v2.BatchRecognizeRequest.config] completely
     * overrides and replaces the config in the recognizer for this recognition
     * request.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask config_mask = 5;</code>
     * @param \Google\Protobuf\FieldMask $var
     * @return $this
     */
    public function setConfigMask($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\FieldMask::class);
        $this->config_mask = $var;

        return $this;
    }

    /**
     * Audio files with file metadata for ASR.
     * The maximum number of files allowed to be specified is 5.
     *
     * Generated from protobuf field <code>repeated .google.cloud.speech.v2.BatchRecognizeFileMetadata files = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Audio files with file metadata for ASR.
     * The maximum number of files allowed to be specified is 5.
     *
     * Generated from protobuf field <code>repeated .google.cloud.speech.v2.BatchRecognizeFileMetadata files = 3;</code>
     * @param array<\Google\Cloud\Speech\V2\BatchRecognizeFileMetadata>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFiles($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Speech\V2\BatchRecognizeFileMetadata::class);
        $this->files = $arr;

        return $this;
    }

    /**
     * Configuration options for where to output the transcripts of each file.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v2.RecognitionOutputConfig recognition_output_config = 6;</code>
     * @return \Google\Cloud\Speech\V2\RecognitionOutputConfig|null
     */
    public function getRecognitionOutputConfig()
    {
        return $this->recognition_output_config;
    }

    public function hasRecognitionOutputConfig()
    {
        return isset($this->recognition_output_config);
    }

    public function clearRecognitionOutputConfig()
    {
        unset($this->recognition_output_config);
    }

    /**
     * Configuration options for where to output the transcripts of each file.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v2.RecognitionOutputConfig recognition_output_config = 6;</code>
     * @param \Google\Cloud\Speech\V2\RecognitionOutputConfig $var
     * @return $this
     */
    public function setRecognitionOutputConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Speech\V2\RecognitionOutputConfig::class);
        $this->recognition_output_config = $var;

        return $this;
    }

    /**
     * Processing strategy to use for this request.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v2.BatchRecognizeRequest.ProcessingStrategy processing_strategy = 7;</code>
     * @return int
     */
    public function getProcessingStrategy()
    {
        return $this->processing_strategy;
    }

    /**
     * Processing strategy to use for this request.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v2.BatchRecognizeRequest.ProcessingStrategy processing_strategy = 7;</code>
     * @param int $var
     * @return $this
     */
    public function setProcessingStrategy($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Speech\V2\BatchRecognizeRequest\ProcessingStrategy::class);
        $this->processing_strategy = $var;

        return $this;
    }

}

