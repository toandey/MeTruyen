<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/vision/v1/image_annotator.proto

namespace Google\Cloud\Vision\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Set of crop hints that are used to generate new crops when serving images.
 *
 * Generated from protobuf message <code>google.cloud.vision.v1.CropHintsAnnotation</code>
 */
class CropHintsAnnotation extends \Google\Protobuf\Internal\Message
{
    /**
     * Crop hint results.
     *
     * Generated from protobuf field <code>repeated .google.cloud.vision.v1.CropHint crop_hints = 1;</code>
     */
    private $crop_hints;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Cloud\Vision\V1\CropHint>|\Google\Protobuf\Internal\RepeatedField $crop_hints
     *           Crop hint results.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Vision\V1\ImageAnnotator::initOnce();
        parent::__construct($data);
    }

    /**
     * Crop hint results.
     *
     * Generated from protobuf field <code>repeated .google.cloud.vision.v1.CropHint crop_hints = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCropHints()
    {
        return $this->crop_hints;
    }

    /**
     * Crop hint results.
     *
     * Generated from protobuf field <code>repeated .google.cloud.vision.v1.CropHint crop_hints = 1;</code>
     * @param array<\Google\Cloud\Vision\V1\CropHint>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCropHints($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Vision\V1\CropHint::class);
        $this->crop_hints = $arr;

        return $this;
    }

}

