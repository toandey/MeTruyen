<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/datalabeling/v1beta1/human_annotation_config.proto

namespace GPBMetadata\Google\Cloud\Datalabeling\V1Beta1;

class HumanAnnotationConfig
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
?google/cloud/datalabeling/v1beta1/human_annotation_config.proto!google.cloud.datalabeling.v1beta1google/protobuf/duration.proto"�
HumanAnnotationConfig
instruction (	B�A+
annotated_dataset_display_name (	B�A*
annotated_dataset_description (	B�A
label_group (	B�A
language_code (	B�A
replica_count (B�A9
question_duration (2.google.protobuf.DurationB�A
contributor_emails	 (	B�A
user_email_address
 (	"�
ImageClassificationConfig 
annotation_spec_set (	B�A
allow_multi_label (B�A^
answer_aggregation_type (28.google.cloud.datalabeling.v1beta1.StringAggregationTypeB�A"X
BoundingPolyConfig 
annotation_spec_set (	B�A 
instruction_message (	B�A"T
PolylineConfig 
annotation_spec_set (	B�A 
instruction_message (	B�A"S
SegmentationConfig 
annotation_spec_set (	B�A
instruction_message (	"�
VideoClassificationConfig~
annotation_spec_set_configs (2T.google.cloud.datalabeling.v1beta1.VideoClassificationConfig.AnnotationSpecSetConfigB�A!
apply_shot_detection (B�A[
AnnotationSpecSetConfig 
annotation_spec_set (	B�A
allow_multi_label (B�A"]
ObjectDetectionConfig 
annotation_spec_set (	B�A"
extraction_frame_rate (B�A"8
ObjectTrackingConfig 
annotation_spec_set (	B�A"0
EventConfig!
annotation_spec_sets (	B�A"�
TextClassificationConfig
allow_multi_label (B�A 
annotation_spec_set (	B�AQ
sentiment_config (22.google.cloud.datalabeling.v1beta1.SentimentConfigB�A";
SentimentConfig(
 enable_label_sentiment_selection (">
TextEntityExtractionConfig 
annotation_spec_set (	B�A*{
StringAggregationType\'
#STRING_AGGREGATION_TYPE_UNSPECIFIED 
MAJORITY_VOTE
UNANIMOUS_VOTE
NO_AGGREGATIONB�
%com.google.cloud.datalabeling.v1beta1PZIcloud.google.com/go/datalabeling/apiv1beta1/datalabelingpb;datalabelingpb�!Google.Cloud.DataLabeling.V1Beta1�!Google\\Cloud\\DataLabeling\\V1beta1�$Google::Cloud::DataLabeling::V1beta1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

