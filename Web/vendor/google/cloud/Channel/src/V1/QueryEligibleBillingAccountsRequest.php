<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/channel/v1/service.proto

namespace Google\Cloud\Channel\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for QueryEligibleBillingAccounts.
 *
 * Generated from protobuf message <code>google.cloud.channel.v1.QueryEligibleBillingAccountsRequest</code>
 */
class QueryEligibleBillingAccountsRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The resource name of the customer to list eligible billing
     * accounts for. Format: accounts/{account_id}/customers/{customer_id}.
     *
     * Generated from protobuf field <code>string customer = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $customer = '';
    /**
     * Required. List of SKUs to list eligible billing accounts for. At least one
     * SKU is required. Format: products/{product_id}/skus/{sku_id}.
     *
     * Generated from protobuf field <code>repeated string skus = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $skus;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $customer
     *           Required. The resource name of the customer to list eligible billing
     *           accounts for. Format: accounts/{account_id}/customers/{customer_id}.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $skus
     *           Required. List of SKUs to list eligible billing accounts for. At least one
     *           SKU is required. Format: products/{product_id}/skus/{sku_id}.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Channel\V1\Service::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The resource name of the customer to list eligible billing
     * accounts for. Format: accounts/{account_id}/customers/{customer_id}.
     *
     * Generated from protobuf field <code>string customer = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Required. The resource name of the customer to list eligible billing
     * accounts for. Format: accounts/{account_id}/customers/{customer_id}.
     *
     * Generated from protobuf field <code>string customer = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setCustomer($var)
    {
        GPBUtil::checkString($var, True);
        $this->customer = $var;

        return $this;
    }

    /**
     * Required. List of SKUs to list eligible billing accounts for. At least one
     * SKU is required. Format: products/{product_id}/skus/{sku_id}.
     *
     * Generated from protobuf field <code>repeated string skus = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSkus()
    {
        return $this->skus;
    }

    /**
     * Required. List of SKUs to list eligible billing accounts for. At least one
     * SKU is required. Format: products/{product_id}/skus/{sku_id}.
     *
     * Generated from protobuf field <code>repeated string skus = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSkus($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->skus = $arr;

        return $this;
    }

}
