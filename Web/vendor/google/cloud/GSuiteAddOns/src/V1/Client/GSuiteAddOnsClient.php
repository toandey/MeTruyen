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
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/gsuiteaddons/v1/gsuiteaddons.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\GSuiteAddOns\V1\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\GSuiteAddOns\V1\Authorization;
use Google\Cloud\GSuiteAddOns\V1\CreateDeploymentRequest;
use Google\Cloud\GSuiteAddOns\V1\DeleteDeploymentRequest;
use Google\Cloud\GSuiteAddOns\V1\Deployment;
use Google\Cloud\GSuiteAddOns\V1\GetAuthorizationRequest;
use Google\Cloud\GSuiteAddOns\V1\GetDeploymentRequest;
use Google\Cloud\GSuiteAddOns\V1\GetInstallStatusRequest;
use Google\Cloud\GSuiteAddOns\V1\InstallDeploymentRequest;
use Google\Cloud\GSuiteAddOns\V1\InstallStatus;
use Google\Cloud\GSuiteAddOns\V1\ListDeploymentsRequest;
use Google\Cloud\GSuiteAddOns\V1\ReplaceDeploymentRequest;
use Google\Cloud\GSuiteAddOns\V1\UninstallDeploymentRequest;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Service Description: A service for managing Google Workspace Add-ons deployments.
 *
 * A Google Workspace Add-on is a third-party embedded component that can be
 * installed in Google Workspace Applications like Gmail, Calendar, Drive, and
 * the Google Docs, Sheets, and Slides editors. Google Workspace Add-ons can
 * display UI cards, receive contextual information from the host application,
 * and perform actions in the host application (See:
 * https://developers.google.com/gsuite/add-ons/overview for more information).
 *
 * A Google Workspace Add-on deployment resource specifies metadata about the
 * add-on, including a specification of the entry points in the host application
 * that trigger add-on executions (see:
 * https://developers.google.com/gsuite/add-ons/concepts/gsuite-manifests).
 * Add-on deployments defined via the Google Workspace Add-ons API define their
 * entrypoints using HTTPS URLs (See:
 * https://developers.google.com/gsuite/add-ons/guides/alternate-runtimes),
 *
 * A Google Workspace Add-on deployment can be installed in developer mode,
 * which allows an add-on developer to test the experience an end-user would see
 * when installing and running the add-on in their G Suite applications.  When
 * running in developer mode, more detailed error messages are exposed in the
 * add-on UI to aid in debugging.
 *
 * A Google Workspace Add-on deployment can be published to Google Workspace
 * Marketplace, which allows other Google Workspace users to discover and
 * install the add-on.  See:
 * https://developers.google.com/gsuite/add-ons/how-tos/publish-add-on-overview
 * for details.
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
 * \Google\Cloud\GSuiteAddOns\V1\GSuiteAddOnsClient} for the stable implementation
 *
 * @experimental
 *
 * @method PromiseInterface createDeploymentAsync(CreateDeploymentRequest $request, array $optionalArgs = [])
 * @method PromiseInterface deleteDeploymentAsync(DeleteDeploymentRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getAuthorizationAsync(GetAuthorizationRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getDeploymentAsync(GetDeploymentRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getInstallStatusAsync(GetInstallStatusRequest $request, array $optionalArgs = [])
 * @method PromiseInterface installDeploymentAsync(InstallDeploymentRequest $request, array $optionalArgs = [])
 * @method PromiseInterface listDeploymentsAsync(ListDeploymentsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface replaceDeploymentAsync(ReplaceDeploymentRequest $request, array $optionalArgs = [])
 * @method PromiseInterface uninstallDeploymentAsync(UninstallDeploymentRequest $request, array $optionalArgs = [])
 */
final class GSuiteAddOnsClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.cloud.gsuiteaddons.v1.GSuiteAddOns';

    /** The default address of the service. */
    private const SERVICE_ADDRESS = 'gsuiteaddons.googleapis.com';

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
            'clientConfig' => __DIR__ . '/../resources/g_suite_add_ons_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/g_suite_add_ons_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/g_suite_add_ons_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/g_suite_add_ons_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * authorization resource.
     *
     * @param string $project
     *
     * @return string The formatted authorization resource.
     */
    public static function authorizationName(string $project): string
    {
        return self::getPathTemplate('authorization')->render([
            'project' => $project,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a deployment
     * resource.
     *
     * @param string $project
     * @param string $deployment
     *
     * @return string The formatted deployment resource.
     */
    public static function deploymentName(string $project, string $deployment): string
    {
        return self::getPathTemplate('deployment')->render([
            'project' => $project,
            'deployment' => $deployment,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * install_status resource.
     *
     * @param string $project
     * @param string $deployment
     *
     * @return string The formatted install_status resource.
     */
    public static function installStatusName(string $project, string $deployment): string
    {
        return self::getPathTemplate('installStatus')->render([
            'project' => $project,
            'deployment' => $deployment,
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
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - authorization: projects/{project}/authorization
     * - deployment: projects/{project}/deployments/{deployment}
     * - installStatus: projects/{project}/deployments/{deployment}/installStatus
     * - project: projects/{project}
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
     *           as "<uri>:<port>". Default 'gsuiteaddons.googleapis.com:443'.
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
     * Creates a deployment with the specified name and configuration.
     *
     * The async variant is {@see GSuiteAddOnsClient::createDeploymentAsync()} .
     *
     * @example samples/V1/GSuiteAddOnsClient/create_deployment.php
     *
     * @param CreateDeploymentRequest $request     A request to house fields associated with the call.
     * @param array                   $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Deployment
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createDeployment(CreateDeploymentRequest $request, array $callOptions = []): Deployment
    {
        return $this->startApiCall('CreateDeployment', $request, $callOptions)->wait();
    }

    /**
     * Deletes the deployment with the given name.
     *
     * The async variant is {@see GSuiteAddOnsClient::deleteDeploymentAsync()} .
     *
     * @example samples/V1/GSuiteAddOnsClient/delete_deployment.php
     *
     * @param DeleteDeploymentRequest $request     A request to house fields associated with the call.
     * @param array                   $callOptions {
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
    public function deleteDeployment(DeleteDeploymentRequest $request, array $callOptions = []): void
    {
        $this->startApiCall('DeleteDeployment', $request, $callOptions)->wait();
    }

    /**
     * Gets the authorization information for deployments in a given project.
     *
     * The async variant is {@see GSuiteAddOnsClient::getAuthorizationAsync()} .
     *
     * @example samples/V1/GSuiteAddOnsClient/get_authorization.php
     *
     * @param GetAuthorizationRequest $request     A request to house fields associated with the call.
     * @param array                   $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Authorization
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getAuthorization(GetAuthorizationRequest $request, array $callOptions = []): Authorization
    {
        return $this->startApiCall('GetAuthorization', $request, $callOptions)->wait();
    }

    /**
     * Gets the deployment with the specified name.
     *
     * The async variant is {@see GSuiteAddOnsClient::getDeploymentAsync()} .
     *
     * @example samples/V1/GSuiteAddOnsClient/get_deployment.php
     *
     * @param GetDeploymentRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Deployment
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getDeployment(GetDeploymentRequest $request, array $callOptions = []): Deployment
    {
        return $this->startApiCall('GetDeployment', $request, $callOptions)->wait();
    }

    /**
     * Fetches the install status of a developer mode deployment.
     *
     * The async variant is {@see GSuiteAddOnsClient::getInstallStatusAsync()} .
     *
     * @example samples/V1/GSuiteAddOnsClient/get_install_status.php
     *
     * @param GetInstallStatusRequest $request     A request to house fields associated with the call.
     * @param array                   $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return InstallStatus
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getInstallStatus(GetInstallStatusRequest $request, array $callOptions = []): InstallStatus
    {
        return $this->startApiCall('GetInstallStatus', $request, $callOptions)->wait();
    }

    /**
     * Installs a deployment in developer mode.
     * See:
     * https://developers.google.com/gsuite/add-ons/how-tos/testing-gsuite-addons.
     *
     * The async variant is {@see GSuiteAddOnsClient::installDeploymentAsync()} .
     *
     * @example samples/V1/GSuiteAddOnsClient/install_deployment.php
     *
     * @param InstallDeploymentRequest $request     A request to house fields associated with the call.
     * @param array                    $callOptions {
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
    public function installDeployment(InstallDeploymentRequest $request, array $callOptions = []): void
    {
        $this->startApiCall('InstallDeployment', $request, $callOptions)->wait();
    }

    /**
     * Lists all deployments in a particular project.
     *
     * The async variant is {@see GSuiteAddOnsClient::listDeploymentsAsync()} .
     *
     * @example samples/V1/GSuiteAddOnsClient/list_deployments.php
     *
     * @param ListDeploymentsRequest $request     A request to house fields associated with the call.
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
    public function listDeployments(ListDeploymentsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListDeployments', $request, $callOptions);
    }

    /**
     * Creates or replaces a deployment with the specified name.
     *
     * The async variant is {@see GSuiteAddOnsClient::replaceDeploymentAsync()} .
     *
     * @example samples/V1/GSuiteAddOnsClient/replace_deployment.php
     *
     * @param ReplaceDeploymentRequest $request     A request to house fields associated with the call.
     * @param array                    $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Deployment
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function replaceDeployment(ReplaceDeploymentRequest $request, array $callOptions = []): Deployment
    {
        return $this->startApiCall('ReplaceDeployment', $request, $callOptions)->wait();
    }

    /**
     * Uninstalls a developer mode deployment.
     * See:
     * https://developers.google.com/gsuite/add-ons/how-tos/testing-gsuite-addons.
     *
     * The async variant is {@see GSuiteAddOnsClient::uninstallDeploymentAsync()} .
     *
     * @example samples/V1/GSuiteAddOnsClient/uninstall_deployment.php
     *
     * @param UninstallDeploymentRequest $request     A request to house fields associated with the call.
     * @param array                      $callOptions {
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
    public function uninstallDeployment(UninstallDeploymentRequest $request, array $callOptions = []): void
    {
        $this->startApiCall('UninstallDeployment', $request, $callOptions)->wait();
    }
}
