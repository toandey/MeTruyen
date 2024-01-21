<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/migrationcenter/v1/migrationcenter.proto

namespace Google\Cloud\MigrationCenter\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A request to get a Report.
 *
 * Generated from protobuf message <code>google.cloud.migrationcenter.v1.GetReportRequest</code>
 */
class GetReportRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Name of the resource.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    protected $name = '';
    /**
     * Determines what information to retrieve for the Report.
     *
     * Generated from protobuf field <code>.google.cloud.migrationcenter.v1.ReportView view = 6;</code>
     */
    protected $view = 0;

    /**
     * @param string $name Required. Name of the resource. Please see
     *                     {@see MigrationCenterClient::reportName()} for help formatting this field.
     *
     * @return \Google\Cloud\MigrationCenter\V1\GetReportRequest
     *
     * @experimental
     */
    public static function build(string $name): self
    {
        return (new self())
            ->setName($name);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Required. Name of the resource.
     *     @type int $view
     *           Determines what information to retrieve for the Report.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Migrationcenter\V1\Migrationcenter::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Name of the resource.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. Name of the resource.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
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
     * Determines what information to retrieve for the Report.
     *
     * Generated from protobuf field <code>.google.cloud.migrationcenter.v1.ReportView view = 6;</code>
     * @return int
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * Determines what information to retrieve for the Report.
     *
     * Generated from protobuf field <code>.google.cloud.migrationcenter.v1.ReportView view = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setView($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\MigrationCenter\V1\ReportView::class);
        $this->view = $var;

        return $this;
    }

}
