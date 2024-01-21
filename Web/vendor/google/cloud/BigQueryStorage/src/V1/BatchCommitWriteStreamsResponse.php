<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/bigquery/storage/v1/storage.proto

namespace Google\Cloud\BigQuery\Storage\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for `BatchCommitWriteStreams`.
 *
 * Generated from protobuf message <code>google.cloud.bigquery.storage.v1.BatchCommitWriteStreamsResponse</code>
 */
class BatchCommitWriteStreamsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The time at which streams were committed in microseconds granularity.
     * This field will only exist when there are no stream errors.
     * **Note** if this field is not set, it means the commit was not successful.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp commit_time = 1;</code>
     */
    private $commit_time = null;
    /**
     * Stream level error if commit failed. Only streams with error will be in
     * the list.
     * If empty, there is no error and all streams are committed successfully.
     * If non empty, certain streams have errors and ZERO stream is committed due
     * to atomicity guarantee.
     *
     * Generated from protobuf field <code>repeated .google.cloud.bigquery.storage.v1.StorageError stream_errors = 2;</code>
     */
    private $stream_errors;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Protobuf\Timestamp $commit_time
     *           The time at which streams were committed in microseconds granularity.
     *           This field will only exist when there are no stream errors.
     *           **Note** if this field is not set, it means the commit was not successful.
     *     @type array<\Google\Cloud\BigQuery\Storage\V1\StorageError>|\Google\Protobuf\Internal\RepeatedField $stream_errors
     *           Stream level error if commit failed. Only streams with error will be in
     *           the list.
     *           If empty, there is no error and all streams are committed successfully.
     *           If non empty, certain streams have errors and ZERO stream is committed due
     *           to atomicity guarantee.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Bigquery\Storage\V1\Storage::initOnce();
        parent::__construct($data);
    }

    /**
     * The time at which streams were committed in microseconds granularity.
     * This field will only exist when there are no stream errors.
     * **Note** if this field is not set, it means the commit was not successful.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp commit_time = 1;</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getCommitTime()
    {
        return $this->commit_time;
    }

    public function hasCommitTime()
    {
        return isset($this->commit_time);
    }

    public function clearCommitTime()
    {
        unset($this->commit_time);
    }

    /**
     * The time at which streams were committed in microseconds granularity.
     * This field will only exist when there are no stream errors.
     * **Note** if this field is not set, it means the commit was not successful.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp commit_time = 1;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCommitTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->commit_time = $var;

        return $this;
    }

    /**
     * Stream level error if commit failed. Only streams with error will be in
     * the list.
     * If empty, there is no error and all streams are committed successfully.
     * If non empty, certain streams have errors and ZERO stream is committed due
     * to atomicity guarantee.
     *
     * Generated from protobuf field <code>repeated .google.cloud.bigquery.storage.v1.StorageError stream_errors = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getStreamErrors()
    {
        return $this->stream_errors;
    }

    /**
     * Stream level error if commit failed. Only streams with error will be in
     * the list.
     * If empty, there is no error and all streams are committed successfully.
     * If non empty, certain streams have errors and ZERO stream is committed due
     * to atomicity guarantee.
     *
     * Generated from protobuf field <code>repeated .google.cloud.bigquery.storage.v1.StorageError stream_errors = 2;</code>
     * @param array<\Google\Cloud\BigQuery\Storage\V1\StorageError>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setStreamErrors($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\BigQuery\Storage\V1\StorageError::class);
        $this->stream_errors = $arr;

        return $this;
    }

}

