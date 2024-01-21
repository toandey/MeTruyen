<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/pubsub/v1/pubsub.proto

namespace Google\Cloud\PubSub\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request for the GetSubscription method.
 *
 * Generated from protobuf message <code>google.pubsub.v1.GetSubscriptionRequest</code>
 */
class GetSubscriptionRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The name of the subscription to get.
     * Format is `projects/{project}/subscriptions/{sub}`.
     *
     * Generated from protobuf field <code>string subscription = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $subscription = '';

    /**
     * @param string $subscription Required. The name of the subscription to get.
     *                             Format is `projects/{project}/subscriptions/{sub}`. Please see
     *                             {@see SubscriberClient::subscriptionName()} for help formatting this field.
     *
     * @return \Google\Cloud\PubSub\V1\GetSubscriptionRequest
     *
     * @experimental
     */
    public static function build(string $subscription): self
    {
        return (new self())
            ->setSubscription($subscription);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $subscription
     *           Required. The name of the subscription to get.
     *           Format is `projects/{project}/subscriptions/{sub}`.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Pubsub\V1\Pubsub::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The name of the subscription to get.
     * Format is `projects/{project}/subscriptions/{sub}`.
     *
     * Generated from protobuf field <code>string subscription = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getSubscription()
    {
        return $this->subscription;
    }

    /**
     * Required. The name of the subscription to get.
     * Format is `projects/{project}/subscriptions/{sub}`.
     *
     * Generated from protobuf field <code>string subscription = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setSubscription($var)
    {
        GPBUtil::checkString($var, True);
        $this->subscription = $var;

        return $this;
    }

}

