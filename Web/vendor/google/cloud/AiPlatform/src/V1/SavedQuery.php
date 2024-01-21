<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/saved_query.proto

namespace Google\Cloud\AIPlatform\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A SavedQuery is a view of the dataset. It references a subset of annotations
 * by problem type and filters.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.SavedQuery</code>
 */
class SavedQuery extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. Resource name of the SavedQuery.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $name = '';
    /**
     * Required. The user-defined name of the SavedQuery.
     * The name can be up to 128 characters long and can consist of any UTF-8
     * characters.
     *
     * Generated from protobuf field <code>string display_name = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $display_name = '';
    /**
     * Some additional information about the SavedQuery.
     *
     * Generated from protobuf field <code>.google.protobuf.Value metadata = 12;</code>
     */
    private $metadata = null;
    /**
     * Output only. Timestamp when this SavedQuery was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $create_time = null;
    /**
     * Output only. Timestamp when SavedQuery was last updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $update_time = null;
    /**
     * Output only. Filters on the Annotations in the dataset.
     *
     * Generated from protobuf field <code>string annotation_filter = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $annotation_filter = '';
    /**
     * Required. Problem type of the SavedQuery.
     * Allowed values:
     * * IMAGE_CLASSIFICATION_SINGLE_LABEL
     * * IMAGE_CLASSIFICATION_MULTI_LABEL
     * * IMAGE_BOUNDING_POLY
     * * IMAGE_BOUNDING_BOX
     * * TEXT_CLASSIFICATION_SINGLE_LABEL
     * * TEXT_CLASSIFICATION_MULTI_LABEL
     * * TEXT_EXTRACTION
     * * TEXT_SENTIMENT
     * * VIDEO_CLASSIFICATION
     * * VIDEO_OBJECT_TRACKING
     *
     * Generated from protobuf field <code>string problem_type = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $problem_type = '';
    /**
     * Output only. Number of AnnotationSpecs in the context of the SavedQuery.
     *
     * Generated from protobuf field <code>int32 annotation_spec_count = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $annotation_spec_count = 0;
    /**
     * Used to perform a consistent read-modify-write update. If not set, a blind
     * "overwrite" update happens.
     *
     * Generated from protobuf field <code>string etag = 8;</code>
     */
    private $etag = '';
    /**
     * Output only. If the Annotations belonging to the SavedQuery can be used for
     * AutoML training.
     *
     * Generated from protobuf field <code>bool support_automl_training = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $support_automl_training = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Output only. Resource name of the SavedQuery.
     *     @type string $display_name
     *           Required. The user-defined name of the SavedQuery.
     *           The name can be up to 128 characters long and can consist of any UTF-8
     *           characters.
     *     @type \Google\Protobuf\Value $metadata
     *           Some additional information about the SavedQuery.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. Timestamp when this SavedQuery was created.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           Output only. Timestamp when SavedQuery was last updated.
     *     @type string $annotation_filter
     *           Output only. Filters on the Annotations in the dataset.
     *     @type string $problem_type
     *           Required. Problem type of the SavedQuery.
     *           Allowed values:
     *           * IMAGE_CLASSIFICATION_SINGLE_LABEL
     *           * IMAGE_CLASSIFICATION_MULTI_LABEL
     *           * IMAGE_BOUNDING_POLY
     *           * IMAGE_BOUNDING_BOX
     *           * TEXT_CLASSIFICATION_SINGLE_LABEL
     *           * TEXT_CLASSIFICATION_MULTI_LABEL
     *           * TEXT_EXTRACTION
     *           * TEXT_SENTIMENT
     *           * VIDEO_CLASSIFICATION
     *           * VIDEO_OBJECT_TRACKING
     *     @type int $annotation_spec_count
     *           Output only. Number of AnnotationSpecs in the context of the SavedQuery.
     *     @type string $etag
     *           Used to perform a consistent read-modify-write update. If not set, a blind
     *           "overwrite" update happens.
     *     @type bool $support_automl_training
     *           Output only. If the Annotations belonging to the SavedQuery can be used for
     *           AutoML training.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\SavedQuery::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. Resource name of the SavedQuery.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Output only. Resource name of the SavedQuery.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Required. The user-defined name of the SavedQuery.
     * The name can be up to 128 characters long and can consist of any UTF-8
     * characters.
     *
     * Generated from protobuf field <code>string display_name = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Required. The user-defined name of the SavedQuery.
     * The name can be up to 128 characters long and can consist of any UTF-8
     * characters.
     *
     * Generated from protobuf field <code>string display_name = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->display_name = $var;

        return $this;
    }

    /**
     * Some additional information about the SavedQuery.
     *
     * Generated from protobuf field <code>.google.protobuf.Value metadata = 12;</code>
     * @return \Google\Protobuf\Value|null
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    public function hasMetadata()
    {
        return isset($this->metadata);
    }

    public function clearMetadata()
    {
        unset($this->metadata);
    }

    /**
     * Some additional information about the SavedQuery.
     *
     * Generated from protobuf field <code>.google.protobuf.Value metadata = 12;</code>
     * @param \Google\Protobuf\Value $var
     * @return $this
     */
    public function setMetadata($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Value::class);
        $this->metadata = $var;

        return $this;
    }

    /**
     * Output only. Timestamp when this SavedQuery was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    public function hasCreateTime()
    {
        return isset($this->create_time);
    }

    public function clearCreateTime()
    {
        unset($this->create_time);
    }

    /**
     * Output only. Timestamp when this SavedQuery was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

    /**
     * Output only. Timestamp when SavedQuery was last updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    public function hasUpdateTime()
    {
        return isset($this->update_time);
    }

    public function clearUpdateTime()
    {
        unset($this->update_time);
    }

    /**
     * Output only. Timestamp when SavedQuery was last updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setUpdateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->update_time = $var;

        return $this;
    }

    /**
     * Output only. Filters on the Annotations in the dataset.
     *
     * Generated from protobuf field <code>string annotation_filter = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getAnnotationFilter()
    {
        return $this->annotation_filter;
    }

    /**
     * Output only. Filters on the Annotations in the dataset.
     *
     * Generated from protobuf field <code>string annotation_filter = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setAnnotationFilter($var)
    {
        GPBUtil::checkString($var, True);
        $this->annotation_filter = $var;

        return $this;
    }

    /**
     * Required. Problem type of the SavedQuery.
     * Allowed values:
     * * IMAGE_CLASSIFICATION_SINGLE_LABEL
     * * IMAGE_CLASSIFICATION_MULTI_LABEL
     * * IMAGE_BOUNDING_POLY
     * * IMAGE_BOUNDING_BOX
     * * TEXT_CLASSIFICATION_SINGLE_LABEL
     * * TEXT_CLASSIFICATION_MULTI_LABEL
     * * TEXT_EXTRACTION
     * * TEXT_SENTIMENT
     * * VIDEO_CLASSIFICATION
     * * VIDEO_OBJECT_TRACKING
     *
     * Generated from protobuf field <code>string problem_type = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getProblemType()
    {
        return $this->problem_type;
    }

    /**
     * Required. Problem type of the SavedQuery.
     * Allowed values:
     * * IMAGE_CLASSIFICATION_SINGLE_LABEL
     * * IMAGE_CLASSIFICATION_MULTI_LABEL
     * * IMAGE_BOUNDING_POLY
     * * IMAGE_BOUNDING_BOX
     * * TEXT_CLASSIFICATION_SINGLE_LABEL
     * * TEXT_CLASSIFICATION_MULTI_LABEL
     * * TEXT_EXTRACTION
     * * TEXT_SENTIMENT
     * * VIDEO_CLASSIFICATION
     * * VIDEO_OBJECT_TRACKING
     *
     * Generated from protobuf field <code>string problem_type = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setProblemType($var)
    {
        GPBUtil::checkString($var, True);
        $this->problem_type = $var;

        return $this;
    }

    /**
     * Output only. Number of AnnotationSpecs in the context of the SavedQuery.
     *
     * Generated from protobuf field <code>int32 annotation_spec_count = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getAnnotationSpecCount()
    {
        return $this->annotation_spec_count;
    }

    /**
     * Output only. Number of AnnotationSpecs in the context of the SavedQuery.
     *
     * Generated from protobuf field <code>int32 annotation_spec_count = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setAnnotationSpecCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->annotation_spec_count = $var;

        return $this;
    }

    /**
     * Used to perform a consistent read-modify-write update. If not set, a blind
     * "overwrite" update happens.
     *
     * Generated from protobuf field <code>string etag = 8;</code>
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * Used to perform a consistent read-modify-write update. If not set, a blind
     * "overwrite" update happens.
     *
     * Generated from protobuf field <code>string etag = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setEtag($var)
    {
        GPBUtil::checkString($var, True);
        $this->etag = $var;

        return $this;
    }

    /**
     * Output only. If the Annotations belonging to the SavedQuery can be used for
     * AutoML training.
     *
     * Generated from protobuf field <code>bool support_automl_training = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return bool
     */
    public function getSupportAutomlTraining()
    {
        return $this->support_automl_training;
    }

    /**
     * Output only. If the Annotations belonging to the SavedQuery can be used for
     * AutoML training.
     *
     * Generated from protobuf field <code>bool support_automl_training = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param bool $var
     * @return $this
     */
    public function setSupportAutomlTraining($var)
    {
        GPBUtil::checkBool($var);
        $this->support_automl_training = $var;

        return $this;
    }

}
