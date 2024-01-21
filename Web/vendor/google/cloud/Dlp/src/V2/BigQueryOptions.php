<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/privacy/dlp/v2/storage.proto

namespace Google\Cloud\Dlp\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Options defining BigQuery table and row identifiers.
 *
 * Generated from protobuf message <code>google.privacy.dlp.v2.BigQueryOptions</code>
 */
class BigQueryOptions extends \Google\Protobuf\Internal\Message
{
    /**
     * Complete BigQuery table reference.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.BigQueryTable table_reference = 1;</code>
     */
    private $table_reference = null;
    /**
     * Table fields that may uniquely identify a row within the table. When
     * `actions.saveFindings.outputConfig.table` is specified, the values of
     * columns specified here are available in the output table under
     * `location.content_locations.record_location.record_key.id_values`. Nested
     * fields such as `person.birthdate.year` are allowed.
     *
     * Generated from protobuf field <code>repeated .google.privacy.dlp.v2.FieldId identifying_fields = 2;</code>
     */
    private $identifying_fields;
    /**
     * Max number of rows to scan. If the table has more rows than this value, the
     * rest of the rows are omitted. If not set, or if set to 0, all rows will be
     * scanned. Only one of rows_limit and rows_limit_percent can be specified.
     * Cannot be used in conjunction with TimespanConfig.
     *
     * Generated from protobuf field <code>int64 rows_limit = 3;</code>
     */
    private $rows_limit = 0;
    /**
     * Max percentage of rows to scan. The rest are omitted. The number of rows
     * scanned is rounded down. Must be between 0 and 100, inclusively. Both 0 and
     * 100 means no limit. Defaults to 0. Only one of rows_limit and
     * rows_limit_percent can be specified. Cannot be used in conjunction with
     * TimespanConfig.
     *
     * Generated from protobuf field <code>int32 rows_limit_percent = 6;</code>
     */
    private $rows_limit_percent = 0;
    /**
     * Generated from protobuf field <code>.google.privacy.dlp.v2.BigQueryOptions.SampleMethod sample_method = 4;</code>
     */
    private $sample_method = 0;
    /**
     * References to fields excluded from scanning. This allows you to skip
     * inspection of entire columns which you know have no findings.
     * When inspecting a table, we recommend that you inspect all columns.
     * Otherwise, findings might be affected because hints from excluded columns
     * will not be used.
     *
     * Generated from protobuf field <code>repeated .google.privacy.dlp.v2.FieldId excluded_fields = 5;</code>
     */
    private $excluded_fields;
    /**
     * Limit scanning only to these fields.
     * When inspecting a table, we recommend that you inspect all columns.
     * Otherwise, findings might be affected because hints from excluded columns
     * will not be used.
     *
     * Generated from protobuf field <code>repeated .google.privacy.dlp.v2.FieldId included_fields = 7;</code>
     */
    private $included_fields;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Dlp\V2\BigQueryTable $table_reference
     *           Complete BigQuery table reference.
     *     @type array<\Google\Cloud\Dlp\V2\FieldId>|\Google\Protobuf\Internal\RepeatedField $identifying_fields
     *           Table fields that may uniquely identify a row within the table. When
     *           `actions.saveFindings.outputConfig.table` is specified, the values of
     *           columns specified here are available in the output table under
     *           `location.content_locations.record_location.record_key.id_values`. Nested
     *           fields such as `person.birthdate.year` are allowed.
     *     @type int|string $rows_limit
     *           Max number of rows to scan. If the table has more rows than this value, the
     *           rest of the rows are omitted. If not set, or if set to 0, all rows will be
     *           scanned. Only one of rows_limit and rows_limit_percent can be specified.
     *           Cannot be used in conjunction with TimespanConfig.
     *     @type int $rows_limit_percent
     *           Max percentage of rows to scan. The rest are omitted. The number of rows
     *           scanned is rounded down. Must be between 0 and 100, inclusively. Both 0 and
     *           100 means no limit. Defaults to 0. Only one of rows_limit and
     *           rows_limit_percent can be specified. Cannot be used in conjunction with
     *           TimespanConfig.
     *     @type int $sample_method
     *     @type array<\Google\Cloud\Dlp\V2\FieldId>|\Google\Protobuf\Internal\RepeatedField $excluded_fields
     *           References to fields excluded from scanning. This allows you to skip
     *           inspection of entire columns which you know have no findings.
     *           When inspecting a table, we recommend that you inspect all columns.
     *           Otherwise, findings might be affected because hints from excluded columns
     *           will not be used.
     *     @type array<\Google\Cloud\Dlp\V2\FieldId>|\Google\Protobuf\Internal\RepeatedField $included_fields
     *           Limit scanning only to these fields.
     *           When inspecting a table, we recommend that you inspect all columns.
     *           Otherwise, findings might be affected because hints from excluded columns
     *           will not be used.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Privacy\Dlp\V2\Storage::initOnce();
        parent::__construct($data);
    }

    /**
     * Complete BigQuery table reference.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.BigQueryTable table_reference = 1;</code>
     * @return \Google\Cloud\Dlp\V2\BigQueryTable|null
     */
    public function getTableReference()
    {
        return $this->table_reference;
    }

    public function hasTableReference()
    {
        return isset($this->table_reference);
    }

    public function clearTableReference()
    {
        unset($this->table_reference);
    }

    /**
     * Complete BigQuery table reference.
     *
     * Generated from protobuf field <code>.google.privacy.dlp.v2.BigQueryTable table_reference = 1;</code>
     * @param \Google\Cloud\Dlp\V2\BigQueryTable $var
     * @return $this
     */
    public function setTableReference($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dlp\V2\BigQueryTable::class);
        $this->table_reference = $var;

        return $this;
    }

    /**
     * Table fields that may uniquely identify a row within the table. When
     * `actions.saveFindings.outputConfig.table` is specified, the values of
     * columns specified here are available in the output table under
     * `location.content_locations.record_location.record_key.id_values`. Nested
     * fields such as `person.birthdate.year` are allowed.
     *
     * Generated from protobuf field <code>repeated .google.privacy.dlp.v2.FieldId identifying_fields = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getIdentifyingFields()
    {
        return $this->identifying_fields;
    }

    /**
     * Table fields that may uniquely identify a row within the table. When
     * `actions.saveFindings.outputConfig.table` is specified, the values of
     * columns specified here are available in the output table under
     * `location.content_locations.record_location.record_key.id_values`. Nested
     * fields such as `person.birthdate.year` are allowed.
     *
     * Generated from protobuf field <code>repeated .google.privacy.dlp.v2.FieldId identifying_fields = 2;</code>
     * @param array<\Google\Cloud\Dlp\V2\FieldId>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setIdentifyingFields($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Dlp\V2\FieldId::class);
        $this->identifying_fields = $arr;

        return $this;
    }

    /**
     * Max number of rows to scan. If the table has more rows than this value, the
     * rest of the rows are omitted. If not set, or if set to 0, all rows will be
     * scanned. Only one of rows_limit and rows_limit_percent can be specified.
     * Cannot be used in conjunction with TimespanConfig.
     *
     * Generated from protobuf field <code>int64 rows_limit = 3;</code>
     * @return int|string
     */
    public function getRowsLimit()
    {
        return $this->rows_limit;
    }

    /**
     * Max number of rows to scan. If the table has more rows than this value, the
     * rest of the rows are omitted. If not set, or if set to 0, all rows will be
     * scanned. Only one of rows_limit and rows_limit_percent can be specified.
     * Cannot be used in conjunction with TimespanConfig.
     *
     * Generated from protobuf field <code>int64 rows_limit = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setRowsLimit($var)
    {
        GPBUtil::checkInt64($var);
        $this->rows_limit = $var;

        return $this;
    }

    /**
     * Max percentage of rows to scan. The rest are omitted. The number of rows
     * scanned is rounded down. Must be between 0 and 100, inclusively. Both 0 and
     * 100 means no limit. Defaults to 0. Only one of rows_limit and
     * rows_limit_percent can be specified. Cannot be used in conjunction with
     * TimespanConfig.
     *
     * Generated from protobuf field <code>int32 rows_limit_percent = 6;</code>
     * @return int
     */
    public function getRowsLimitPercent()
    {
        return $this->rows_limit_percent;
    }

    /**
     * Max percentage of rows to scan. The rest are omitted. The number of rows
     * scanned is rounded down. Must be between 0 and 100, inclusively. Both 0 and
     * 100 means no limit. Defaults to 0. Only one of rows_limit and
     * rows_limit_percent can be specified. Cannot be used in conjunction with
     * TimespanConfig.
     *
     * Generated from protobuf field <code>int32 rows_limit_percent = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setRowsLimitPercent($var)
    {
        GPBUtil::checkInt32($var);
        $this->rows_limit_percent = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.google.privacy.dlp.v2.BigQueryOptions.SampleMethod sample_method = 4;</code>
     * @return int
     */
    public function getSampleMethod()
    {
        return $this->sample_method;
    }

    /**
     * Generated from protobuf field <code>.google.privacy.dlp.v2.BigQueryOptions.SampleMethod sample_method = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setSampleMethod($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Dlp\V2\BigQueryOptions\SampleMethod::class);
        $this->sample_method = $var;

        return $this;
    }

    /**
     * References to fields excluded from scanning. This allows you to skip
     * inspection of entire columns which you know have no findings.
     * When inspecting a table, we recommend that you inspect all columns.
     * Otherwise, findings might be affected because hints from excluded columns
     * will not be used.
     *
     * Generated from protobuf field <code>repeated .google.privacy.dlp.v2.FieldId excluded_fields = 5;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getExcludedFields()
    {
        return $this->excluded_fields;
    }

    /**
     * References to fields excluded from scanning. This allows you to skip
     * inspection of entire columns which you know have no findings.
     * When inspecting a table, we recommend that you inspect all columns.
     * Otherwise, findings might be affected because hints from excluded columns
     * will not be used.
     *
     * Generated from protobuf field <code>repeated .google.privacy.dlp.v2.FieldId excluded_fields = 5;</code>
     * @param array<\Google\Cloud\Dlp\V2\FieldId>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setExcludedFields($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Dlp\V2\FieldId::class);
        $this->excluded_fields = $arr;

        return $this;
    }

    /**
     * Limit scanning only to these fields.
     * When inspecting a table, we recommend that you inspect all columns.
     * Otherwise, findings might be affected because hints from excluded columns
     * will not be used.
     *
     * Generated from protobuf field <code>repeated .google.privacy.dlp.v2.FieldId included_fields = 7;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getIncludedFields()
    {
        return $this->included_fields;
    }

    /**
     * Limit scanning only to these fields.
     * When inspecting a table, we recommend that you inspect all columns.
     * Otherwise, findings might be affected because hints from excluded columns
     * will not be used.
     *
     * Generated from protobuf field <code>repeated .google.privacy.dlp.v2.FieldId included_fields = 7;</code>
     * @param array<\Google\Cloud\Dlp\V2\FieldId>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setIncludedFields($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Dlp\V2\FieldId::class);
        $this->included_fields = $arr;

        return $this;
    }

}

