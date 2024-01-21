<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/datacatalog/lineage/v1/lineage.proto

namespace Google\Cloud\DataCatalog\Lineage\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for
 * [ListRuns][google.cloud.datacatalog.lineage.v1.ListRuns].
 *
 * Generated from protobuf message <code>google.cloud.datacatalog.lineage.v1.ListRunsRequest</code>
 */
class ListRunsRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The name of process that owns this collection of runs.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    protected $parent = '';
    /**
     * The maximum number of runs to return. The service may return
     * fewer than this value. If unspecified, at most 50 runs are
     * returned. The maximum value is 100; values greater than 100 are cut to
     * 100.
     *
     * Generated from protobuf field <code>int32 page_size = 2;</code>
     */
    protected $page_size = 0;
    /**
     * The page token received from a previous `ListRuns` call. Specify
     * it to get the next page.
     * When paginating, all other parameters specified in this call must
     * match the parameters of the call that provided the page token.
     *
     * Generated from protobuf field <code>string page_token = 3;</code>
     */
    protected $page_token = '';

    /**
     * @param string $parent Required. The name of process that owns this collection of runs. Please see
     *                       {@see LineageClient::processName()} for help formatting this field.
     *
     * @return \Google\Cloud\DataCatalog\Lineage\V1\ListRunsRequest
     *
     * @experimental
     */
    public static function build(string $parent): self
    {
        return (new self())
            ->setParent($parent);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. The name of process that owns this collection of runs.
     *     @type int $page_size
     *           The maximum number of runs to return. The service may return
     *           fewer than this value. If unspecified, at most 50 runs are
     *           returned. The maximum value is 100; values greater than 100 are cut to
     *           100.
     *     @type string $page_token
     *           The page token received from a previous `ListRuns` call. Specify
     *           it to get the next page.
     *           When paginating, all other parameters specified in this call must
     *           match the parameters of the call that provided the page token.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Datacatalog\Lineage\V1\Lineage::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The name of process that owns this collection of runs.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. The name of process that owns this collection of runs.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * The maximum number of runs to return. The service may return
     * fewer than this value. If unspecified, at most 50 runs are
     * returned. The maximum value is 100; values greater than 100 are cut to
     * 100.
     *
     * Generated from protobuf field <code>int32 page_size = 2;</code>
     * @return int
     */
    public function getPageSize()
    {
        return $this->page_size;
    }

    /**
     * The maximum number of runs to return. The service may return
     * fewer than this value. If unspecified, at most 50 runs are
     * returned. The maximum value is 100; values greater than 100 are cut to
     * 100.
     *
     * Generated from protobuf field <code>int32 page_size = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setPageSize($var)
    {
        GPBUtil::checkInt32($var);
        $this->page_size = $var;

        return $this;
    }

    /**
     * The page token received from a previous `ListRuns` call. Specify
     * it to get the next page.
     * When paginating, all other parameters specified in this call must
     * match the parameters of the call that provided the page token.
     *
     * Generated from protobuf field <code>string page_token = 3;</code>
     * @return string
     */
    public function getPageToken()
    {
        return $this->page_token;
    }

    /**
     * The page token received from a previous `ListRuns` call. Specify
     * it to get the next page.
     * When paginating, all other parameters specified in this call must
     * match the parameters of the call that provided the page token.
     *
     * Generated from protobuf field <code>string page_token = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->page_token = $var;

        return $this;
    }

}
