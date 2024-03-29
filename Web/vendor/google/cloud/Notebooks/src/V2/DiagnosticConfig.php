<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/notebooks/v2/diagnostic_config.proto

namespace Google\Cloud\Notebooks\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Defines flags that are used to run the diagnostic tool
 *
 * Generated from protobuf message <code>google.cloud.notebooks.v2.DiagnosticConfig</code>
 */
class DiagnosticConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. User Cloud Storage bucket location (REQUIRED).
     * Must be formatted with path prefix (`gs://$GCS_BUCKET`).
     * Permissions:
     * User Managed Notebooks:
     * - storage.buckets.writer: Must be given to the project's service account
     *   attached to VM.
     * Google Managed Notebooks:
     * - storage.buckets.writer: Must be given to the project's service account or
     *   user credentials attached to VM depending on authentication mode.
     * Cloud Storage bucket Log file will be written to
     * `gs://$GCS_BUCKET/$RELATIVE_PATH/$VM_DATE_$TIME.tar.gz`
     *
     * Generated from protobuf field <code>string gcs_bucket = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $gcs_bucket = '';
    /**
     * Optional. Defines the relative storage path in the Cloud Storage bucket
     * where the diagnostic logs will be written: Default path will be the root
     * directory of the Cloud Storage bucket
     * (`gs://$GCS_BUCKET/$DATE_$TIME.tar.gz`) Example of full path where Log file
     * will be written: `gs://$GCS_BUCKET/$RELATIVE_PATH/`
     *
     * Generated from protobuf field <code>string relative_path = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $relative_path = '';
    /**
     * Optional. Enables flag to repair service for instance
     *
     * Generated from protobuf field <code>bool enable_repair_flag = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $enable_repair_flag = false;
    /**
     * Optional. Enables flag to capture packets from the instance for 30 seconds
     *
     * Generated from protobuf field <code>bool enable_packet_capture_flag = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $enable_packet_capture_flag = false;
    /**
     * Optional. Enables flag to copy all `/home/jupyter` folder contents
     *
     * Generated from protobuf field <code>bool enable_copy_home_files_flag = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $enable_copy_home_files_flag = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $gcs_bucket
     *           Required. User Cloud Storage bucket location (REQUIRED).
     *           Must be formatted with path prefix (`gs://$GCS_BUCKET`).
     *           Permissions:
     *           User Managed Notebooks:
     *           - storage.buckets.writer: Must be given to the project's service account
     *             attached to VM.
     *           Google Managed Notebooks:
     *           - storage.buckets.writer: Must be given to the project's service account or
     *             user credentials attached to VM depending on authentication mode.
     *           Cloud Storage bucket Log file will be written to
     *           `gs://$GCS_BUCKET/$RELATIVE_PATH/$VM_DATE_$TIME.tar.gz`
     *     @type string $relative_path
     *           Optional. Defines the relative storage path in the Cloud Storage bucket
     *           where the diagnostic logs will be written: Default path will be the root
     *           directory of the Cloud Storage bucket
     *           (`gs://$GCS_BUCKET/$DATE_$TIME.tar.gz`) Example of full path where Log file
     *           will be written: `gs://$GCS_BUCKET/$RELATIVE_PATH/`
     *     @type bool $enable_repair_flag
     *           Optional. Enables flag to repair service for instance
     *     @type bool $enable_packet_capture_flag
     *           Optional. Enables flag to capture packets from the instance for 30 seconds
     *     @type bool $enable_copy_home_files_flag
     *           Optional. Enables flag to copy all `/home/jupyter` folder contents
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Notebooks\V2\DiagnosticConfig::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. User Cloud Storage bucket location (REQUIRED).
     * Must be formatted with path prefix (`gs://$GCS_BUCKET`).
     * Permissions:
     * User Managed Notebooks:
     * - storage.buckets.writer: Must be given to the project's service account
     *   attached to VM.
     * Google Managed Notebooks:
     * - storage.buckets.writer: Must be given to the project's service account or
     *   user credentials attached to VM depending on authentication mode.
     * Cloud Storage bucket Log file will be written to
     * `gs://$GCS_BUCKET/$RELATIVE_PATH/$VM_DATE_$TIME.tar.gz`
     *
     * Generated from protobuf field <code>string gcs_bucket = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getGcsBucket()
    {
        return $this->gcs_bucket;
    }

    /**
     * Required. User Cloud Storage bucket location (REQUIRED).
     * Must be formatted with path prefix (`gs://$GCS_BUCKET`).
     * Permissions:
     * User Managed Notebooks:
     * - storage.buckets.writer: Must be given to the project's service account
     *   attached to VM.
     * Google Managed Notebooks:
     * - storage.buckets.writer: Must be given to the project's service account or
     *   user credentials attached to VM depending on authentication mode.
     * Cloud Storage bucket Log file will be written to
     * `gs://$GCS_BUCKET/$RELATIVE_PATH/$VM_DATE_$TIME.tar.gz`
     *
     * Generated from protobuf field <code>string gcs_bucket = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setGcsBucket($var)
    {
        GPBUtil::checkString($var, True);
        $this->gcs_bucket = $var;

        return $this;
    }

    /**
     * Optional. Defines the relative storage path in the Cloud Storage bucket
     * where the diagnostic logs will be written: Default path will be the root
     * directory of the Cloud Storage bucket
     * (`gs://$GCS_BUCKET/$DATE_$TIME.tar.gz`) Example of full path where Log file
     * will be written: `gs://$GCS_BUCKET/$RELATIVE_PATH/`
     *
     * Generated from protobuf field <code>string relative_path = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getRelativePath()
    {
        return $this->relative_path;
    }

    /**
     * Optional. Defines the relative storage path in the Cloud Storage bucket
     * where the diagnostic logs will be written: Default path will be the root
     * directory of the Cloud Storage bucket
     * (`gs://$GCS_BUCKET/$DATE_$TIME.tar.gz`) Example of full path where Log file
     * will be written: `gs://$GCS_BUCKET/$RELATIVE_PATH/`
     *
     * Generated from protobuf field <code>string relative_path = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setRelativePath($var)
    {
        GPBUtil::checkString($var, True);
        $this->relative_path = $var;

        return $this;
    }

    /**
     * Optional. Enables flag to repair service for instance
     *
     * Generated from protobuf field <code>bool enable_repair_flag = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getEnableRepairFlag()
    {
        return $this->enable_repair_flag;
    }

    /**
     * Optional. Enables flag to repair service for instance
     *
     * Generated from protobuf field <code>bool enable_repair_flag = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setEnableRepairFlag($var)
    {
        GPBUtil::checkBool($var);
        $this->enable_repair_flag = $var;

        return $this;
    }

    /**
     * Optional. Enables flag to capture packets from the instance for 30 seconds
     *
     * Generated from protobuf field <code>bool enable_packet_capture_flag = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getEnablePacketCaptureFlag()
    {
        return $this->enable_packet_capture_flag;
    }

    /**
     * Optional. Enables flag to capture packets from the instance for 30 seconds
     *
     * Generated from protobuf field <code>bool enable_packet_capture_flag = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setEnablePacketCaptureFlag($var)
    {
        GPBUtil::checkBool($var);
        $this->enable_packet_capture_flag = $var;

        return $this;
    }

    /**
     * Optional. Enables flag to copy all `/home/jupyter` folder contents
     *
     * Generated from protobuf field <code>bool enable_copy_home_files_flag = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getEnableCopyHomeFilesFlag()
    {
        return $this->enable_copy_home_files_flag;
    }

    /**
     * Optional. Enables flag to copy all `/home/jupyter` folder contents
     *
     * Generated from protobuf field <code>bool enable_copy_home_files_flag = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setEnableCopyHomeFilesFlag($var)
    {
        GPBUtil::checkBool($var);
        $this->enable_copy_home_files_flag = $var;

        return $this;
    }

}

