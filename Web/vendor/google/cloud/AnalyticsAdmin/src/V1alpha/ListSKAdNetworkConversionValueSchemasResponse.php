<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/analytics/admin/v1alpha/analytics_admin.proto

namespace Google\Analytics\Admin\V1alpha;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for ListSKAdNetworkConversionValueSchemas RPC
 *
 * Generated from protobuf message <code>google.analytics.admin.v1alpha.ListSKAdNetworkConversionValueSchemasResponse</code>
 */
class ListSKAdNetworkConversionValueSchemasResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * List of SKAdNetworkConversionValueSchemas. This will have at most one
     * value.
     *
     * Generated from protobuf field <code>repeated .google.analytics.admin.v1alpha.SKAdNetworkConversionValueSchema skadnetwork_conversion_value_schemas = 1;</code>
     */
    private $skadnetwork_conversion_value_schemas;
    /**
     * A token, which can be sent as `page_token` to retrieve the next page.
     * If this field is omitted, there are no subsequent pages.
     * Currently, Google Analytics supports only one
     * SKAdNetworkConversionValueSchema per dataStream, so this will never be
     * populated.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     */
    private $next_page_token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Analytics\Admin\V1alpha\SKAdNetworkConversionValueSchema>|\Google\Protobuf\Internal\RepeatedField $skadnetwork_conversion_value_schemas
     *           List of SKAdNetworkConversionValueSchemas. This will have at most one
     *           value.
     *     @type string $next_page_token
     *           A token, which can be sent as `page_token` to retrieve the next page.
     *           If this field is omitted, there are no subsequent pages.
     *           Currently, Google Analytics supports only one
     *           SKAdNetworkConversionValueSchema per dataStream, so this will never be
     *           populated.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Analytics\Admin\V1Alpha\AnalyticsAdmin::initOnce();
        parent::__construct($data);
    }

    /**
     * List of SKAdNetworkConversionValueSchemas. This will have at most one
     * value.
     *
     * Generated from protobuf field <code>repeated .google.analytics.admin.v1alpha.SKAdNetworkConversionValueSchema skadnetwork_conversion_value_schemas = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSkadnetworkConversionValueSchemas()
    {
        return $this->skadnetwork_conversion_value_schemas;
    }

    /**
     * List of SKAdNetworkConversionValueSchemas. This will have at most one
     * value.
     *
     * Generated from protobuf field <code>repeated .google.analytics.admin.v1alpha.SKAdNetworkConversionValueSchema skadnetwork_conversion_value_schemas = 1;</code>
     * @param array<\Google\Analytics\Admin\V1alpha\SKAdNetworkConversionValueSchema>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSkadnetworkConversionValueSchemas($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Analytics\Admin\V1alpha\SKAdNetworkConversionValueSchema::class);
        $this->skadnetwork_conversion_value_schemas = $arr;

        return $this;
    }

    /**
     * A token, which can be sent as `page_token` to retrieve the next page.
     * If this field is omitted, there are no subsequent pages.
     * Currently, Google Analytics supports only one
     * SKAdNetworkConversionValueSchema per dataStream, so this will never be
     * populated.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * A token, which can be sent as `page_token` to retrieve the next page.
     * If this field is omitted, there are no subsequent pages.
     * Currently, Google Analytics supports only one
     * SKAdNetworkConversionValueSchema per dataStream, so this will never be
     * populated.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

}

