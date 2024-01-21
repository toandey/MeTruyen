<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dialogflow/v2/context.proto

namespace Google\Cloud\Dialogflow\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The request message for
 * [Contexts.GetContext][google.cloud.dialogflow.v2.Contexts.GetContext].
 *
 * Generated from protobuf message <code>google.cloud.dialogflow.v2.GetContextRequest</code>
 */
class GetContextRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The name of the context. Format:
     * `projects/<Project ID>/agent/sessions/<Session ID>/contexts/<Context ID>`
     * or `projects/<Project ID>/agent/environments/<Environment ID>/users/<User
     * ID>/sessions/<Session ID>/contexts/<Context ID>`.
     * If `Environment ID` is not specified, we assume default 'draft'
     * environment. If `User ID` is not specified, we assume default '-' user.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $name = '';

    /**
     * @param string $name Required. The name of the context. Format:
     *                     `projects/<Project ID>/agent/sessions/<Session ID>/contexts/<Context ID>`
     *                     or `projects/<Project ID>/agent/environments/<Environment ID>/users/<User
     *                     ID>/sessions/<Session ID>/contexts/<Context ID>`.
     *                     If `Environment ID` is not specified, we assume default 'draft'
     *                     environment. If `User ID` is not specified, we assume default '-' user. Please see
     *                     {@see ContextsClient::contextName()} for help formatting this field.
     *
     * @return \Google\Cloud\Dialogflow\V2\GetContextRequest
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
     *           Required. The name of the context. Format:
     *           `projects/<Project ID>/agent/sessions/<Session ID>/contexts/<Context ID>`
     *           or `projects/<Project ID>/agent/environments/<Environment ID>/users/<User
     *           ID>/sessions/<Session ID>/contexts/<Context ID>`.
     *           If `Environment ID` is not specified, we assume default 'draft'
     *           environment. If `User ID` is not specified, we assume default '-' user.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dialogflow\V2\Context::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The name of the context. Format:
     * `projects/<Project ID>/agent/sessions/<Session ID>/contexts/<Context ID>`
     * or `projects/<Project ID>/agent/environments/<Environment ID>/users/<User
     * ID>/sessions/<Session ID>/contexts/<Context ID>`.
     * If `Environment ID` is not specified, we assume default 'draft'
     * environment. If `User ID` is not specified, we assume default '-' user.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. The name of the context. Format:
     * `projects/<Project ID>/agent/sessions/<Session ID>/contexts/<Context ID>`
     * or `projects/<Project ID>/agent/environments/<Environment ID>/users/<User
     * ID>/sessions/<Session ID>/contexts/<Context ID>`.
     * If `Environment ID` is not specified, we assume default 'draft'
     * environment. If `User ID` is not specified, we assume default '-' user.
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

}

