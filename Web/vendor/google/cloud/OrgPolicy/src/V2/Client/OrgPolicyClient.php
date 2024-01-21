<?php
/*
 * Copyright 2023 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/orgpolicy/v2/orgpolicy.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\OrgPolicy\V2\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\OrgPolicy\V2\CreatePolicyRequest;
use Google\Cloud\OrgPolicy\V2\DeletePolicyRequest;
use Google\Cloud\OrgPolicy\V2\GetEffectivePolicyRequest;
use Google\Cloud\OrgPolicy\V2\GetPolicyRequest;
use Google\Cloud\OrgPolicy\V2\ListConstraintsRequest;
use Google\Cloud\OrgPolicy\V2\ListPoliciesRequest;
use Google\Cloud\OrgPolicy\V2\Policy;
use Google\Cloud\OrgPolicy\V2\UpdatePolicyRequest;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Service Description: An interface for managing organization policies.
 *
 * The Cloud Org Policy service provides a simple mechanism for organizations to
 * restrict the allowed configurations across their entire Cloud Resource
 * hierarchy.
 *
 * You can use a `policy` to configure restrictions in Cloud resources. For
 * example, you can enforce a `policy` that restricts which Google
 * Cloud Platform APIs can be activated in a certain part of your resource
 * hierarchy, or prevents serial port access to VM instances in a particular
 * folder.
 *
 * `Policies` are inherited down through the resource hierarchy. A `policy`
 * applied to a parent resource automatically applies to all its child resources
 * unless overridden with a `policy` lower in the hierarchy.
 *
 * A `constraint` defines an aspect of a resource's configuration that can be
 * controlled by an organization's policy administrator. `Policies` are a
 * collection of `constraints` that defines their allowable configuration on a
 * particular resource and its child resources.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * This class is currently experimental and may be subject to changes. See {@see
 * \Google\Cloud\OrgPolicy\V2\OrgPolicyClient} for the stable implementation
 *
 * @experimental
 *
 * @method PromiseInterface createPolicyAsync(CreatePolicyRequest $request, array $optionalArgs = [])
 * @method PromiseInterface deletePolicyAsync(DeletePolicyRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getEffectivePolicyAsync(GetEffectivePolicyRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getPolicyAsync(GetPolicyRequest $request, array $optionalArgs = [])
 * @method PromiseInterface listConstraintsAsync(ListConstraintsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface listPoliciesAsync(ListPoliciesRequest $request, array $optionalArgs = [])
 * @method PromiseInterface updatePolicyAsync(UpdatePolicyRequest $request, array $optionalArgs = [])
 */
final class OrgPolicyClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.cloud.orgpolicy.v2.OrgPolicy';

    /** The default address of the service. */
    private const SERVICE_ADDRESS = 'orgpolicy.googleapis.com';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/org_policy_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/org_policy_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/org_policy_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/org_policy_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Formats a string containing the fully-qualified path to represent a folder
     * resource.
     *
     * @param string $folder
     *
     * @return string The formatted folder resource.
     */
    public static function folderName(string $folder): string
    {
        return self::getPathTemplate('folder')->render([
            'folder' => $folder,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * folder_policy resource.
     *
     * @param string $folder
     * @param string $policy
     *
     * @return string The formatted folder_policy resource.
     */
    public static function folderPolicyName(string $folder, string $policy): string
    {
        return self::getPathTemplate('folderPolicy')->render([
            'folder' => $folder,
            'policy' => $policy,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a organization
     * resource.
     *
     * @param string $organization
     *
     * @return string The formatted organization resource.
     */
    public static function organizationName(string $organization): string
    {
        return self::getPathTemplate('organization')->render([
            'organization' => $organization,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * organization_policy resource.
     *
     * @param string $organization
     * @param string $policy
     *
     * @return string The formatted organization_policy resource.
     */
    public static function organizationPolicyName(string $organization, string $policy): string
    {
        return self::getPathTemplate('organizationPolicy')->render([
            'organization' => $organization,
            'policy' => $policy,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a policy
     * resource.
     *
     * @param string $project
     * @param string $policy
     *
     * @return string The formatted policy resource.
     */
    public static function policyName(string $project, string $policy): string
    {
        return self::getPathTemplate('policy')->render([
            'project' => $project,
            'policy' => $policy,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a project
     * resource.
     *
     * @param string $project
     *
     * @return string The formatted project resource.
     */
    public static function projectName(string $project): string
    {
        return self::getPathTemplate('project')->render([
            'project' => $project,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * project_policy resource.
     *
     * @param string $project
     * @param string $policy
     *
     * @return string The formatted project_policy resource.
     */
    public static function projectPolicyName(string $project, string $policy): string
    {
        return self::getPathTemplate('projectPolicy')->render([
            'project' => $project,
            'policy' => $policy,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - folder: folders/{folder}
     * - folderPolicy: folders/{folder}/policies/{policy}
     * - organization: organizations/{organization}
     * - organizationPolicy: organizations/{organization}/policies/{policy}
     * - policy: projects/{project}/policies/{policy}
     * - project: projects/{project}
     * - projectPolicy: projects/{project}/policies/{policy}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     */
    public static function parseName(string $formattedName, string $template = null): array
    {
        return self::parseFormattedName($formattedName, $template);
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'orgpolicy.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /** Handles execution of the async variants for each documented method. */
    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * Creates a Policy.
     *
     * Returns a `google.rpc.Status` with `google.rpc.Code.NOT_FOUND` if the
     * constraint does not exist.
     * Returns a `google.rpc.Status` with `google.rpc.Code.ALREADY_EXISTS` if the
     * policy already exists on the given Cloud resource.
     *
     * The async variant is {@see OrgPolicyClient::createPolicyAsync()} .
     *
     * @example samples/V2/OrgPolicyClient/create_policy.php
     *
     * @param CreatePolicyRequest $request     A request to house fields associated with the call.
     * @param array               $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Policy
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createPolicy(CreatePolicyRequest $request, array $callOptions = []): Policy
    {
        return $this->startApiCall('CreatePolicy', $request, $callOptions)->wait();
    }

    /**
     * Deletes a Policy.
     *
     * Returns a `google.rpc.Status` with `google.rpc.Code.NOT_FOUND` if the
     * constraint or Org Policy does not exist.
     *
     * The async variant is {@see OrgPolicyClient::deletePolicyAsync()} .
     *
     * @example samples/V2/OrgPolicyClient/delete_policy.php
     *
     * @param DeletePolicyRequest $request     A request to house fields associated with the call.
     * @param array               $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function deletePolicy(DeletePolicyRequest $request, array $callOptions = []): void
    {
        $this->startApiCall('DeletePolicy', $request, $callOptions)->wait();
    }

    /**
     * Gets the effective `Policy` on a resource. This is the result of merging
     * `Policies` in the resource hierarchy and evaluating conditions. The
     * returned `Policy` will not have an `etag` or `condition` set because it is
     * a computed `Policy` across multiple resources.
     * Subtrees of Resource Manager resource hierarchy with 'under:' prefix will
     * not be expanded.
     *
     * The async variant is {@see OrgPolicyClient::getEffectivePolicyAsync()} .
     *
     * @example samples/V2/OrgPolicyClient/get_effective_policy.php
     *
     * @param GetEffectivePolicyRequest $request     A request to house fields associated with the call.
     * @param array                     $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Policy
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getEffectivePolicy(GetEffectivePolicyRequest $request, array $callOptions = []): Policy
    {
        return $this->startApiCall('GetEffectivePolicy', $request, $callOptions)->wait();
    }

    /**
     * Gets a `Policy` on a resource.
     *
     * If no `Policy` is set on the resource, NOT_FOUND is returned. The
     * `etag` value can be used with `UpdatePolicy()` to update a
     * `Policy` during read-modify-write.
     *
     * The async variant is {@see OrgPolicyClient::getPolicyAsync()} .
     *
     * @example samples/V2/OrgPolicyClient/get_policy.php
     *
     * @param GetPolicyRequest $request     A request to house fields associated with the call.
     * @param array            $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Policy
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getPolicy(GetPolicyRequest $request, array $callOptions = []): Policy
    {
        return $this->startApiCall('GetPolicy', $request, $callOptions)->wait();
    }

    /**
     * Lists `Constraints` that could be applied on the specified resource.
     *
     * The async variant is {@see OrgPolicyClient::listConstraintsAsync()} .
     *
     * @example samples/V2/OrgPolicyClient/list_constraints.php
     *
     * @param ListConstraintsRequest $request     A request to house fields associated with the call.
     * @param array                  $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listConstraints(ListConstraintsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListConstraints', $request, $callOptions);
    }

    /**
     * Retrieves all of the `Policies` that exist on a particular resource.
     *
     * The async variant is {@see OrgPolicyClient::listPoliciesAsync()} .
     *
     * @example samples/V2/OrgPolicyClient/list_policies.php
     *
     * @param ListPoliciesRequest $request     A request to house fields associated with the call.
     * @param array               $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listPolicies(ListPoliciesRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListPolicies', $request, $callOptions);
    }

    /**
     * Updates a Policy.
     *
     * Returns a `google.rpc.Status` with `google.rpc.Code.NOT_FOUND` if the
     * constraint or the policy do not exist.
     * Returns a `google.rpc.Status` with `google.rpc.Code.ABORTED` if the etag
     * supplied in the request does not match the persisted etag of the policy
     *
     * Note: the supplied policy will perform a full overwrite of all
     * fields.
     *
     * The async variant is {@see OrgPolicyClient::updatePolicyAsync()} .
     *
     * @example samples/V2/OrgPolicyClient/update_policy.php
     *
     * @param UpdatePolicyRequest $request     A request to house fields associated with the call.
     * @param array               $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Policy
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function updatePolicy(UpdatePolicyRequest $request, array $callOptions = []): Policy
    {
        return $this->startApiCall('UpdatePolicy', $request, $callOptions)->wait();
    }
}