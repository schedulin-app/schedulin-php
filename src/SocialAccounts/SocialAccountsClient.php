<?php

namespace Schedulin\SocialAccounts;

use Psr\Http\Client\ClientInterface;
use Schedulin\Core\Client\RawClient;
use Schedulin\SocialAccounts\Types\ListSocialAccountsResponseItem;
use Schedulin\Exceptions\SchedulinException;
use Schedulin\Exceptions\SchedulinApiException;
use Schedulin\Core\Json\JsonApiRequest;
use Schedulin\Environments;
use Schedulin\Core\Client\HttpMethod;
use Schedulin\Core\Json\JsonDecoder;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Schedulin\SocialAccounts\Requests\UpdateSocialAccountsRequest;
use Schedulin\SocialAccounts\Types\UpdateSocialAccountsResponse;
use Schedulin\SocialAccounts\Requests\DeleteSocialAccountsRequest;
use Schedulin\SocialAccounts\Types\DeleteSocialAccountsResponse;
use Schedulin\SocialAccounts\Requests\UpdateTimezoneSocialAccountsRequest;
use Schedulin\SocialAccounts\Types\UpdateTimezoneSocialAccountsResponse;
use Schedulin\SocialAccounts\Requests\RefreshProfileSocialAccountsRequest;
use Schedulin\SocialAccounts\Types\RefreshProfileSocialAccountsResponse;

class SocialAccountsClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * Retrieve all connected social media accounts for the authenticated user
     *
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?array<ListSocialAccountsResponseItem>
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function list(?array $options = null): ?array
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/social-accounts",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return JsonDecoder::decodeArray($json, [ListSocialAccountsResponseItem::class]); // @phpstan-ignore-line
            }
        } catch (JsonException $e) {
            throw new SchedulinException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SchedulinException(message: $e->getMessage(), previous: $e);
        }
        throw new SchedulinApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Update social media account settings and information
     *
     * @param string $id
     * @param UpdateSocialAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateSocialAccountsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function update(string $id, UpdateSocialAccountsRequest $request = new UpdateSocialAccountsRequest(), ?array $options = null): ?UpdateSocialAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/social-accounts/{$id}",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return UpdateSocialAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SchedulinException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SchedulinException(message: $e->getMessage(), previous: $e);
        }
        throw new SchedulinApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Remove a connected social media account
     *
     * @param string $id
     * @param DeleteSocialAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?DeleteSocialAccountsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function delete(string $id, DeleteSocialAccountsRequest $request = new DeleteSocialAccountsRequest(), ?array $options = null): ?DeleteSocialAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/social-accounts/{$id}",
                    method: HttpMethod::DELETE,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return DeleteSocialAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SchedulinException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SchedulinException(message: $e->getMessage(), previous: $e);
        }
        throw new SchedulinApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Set the IANA timezone (e.g. 'America/Los_Angeles') used to interpret queue times for this account.
     *
     * @param string $id
     * @param UpdateTimezoneSocialAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?UpdateTimezoneSocialAccountsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function updateTimezone(string $id, UpdateTimezoneSocialAccountsRequest $request, ?array $options = null): ?UpdateTimezoneSocialAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/social-accounts/{$id}/timezone",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return UpdateTimezoneSocialAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SchedulinException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SchedulinException(message: $e->getMessage(), previous: $e);
        }
        throw new SchedulinApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }

    /**
     * Fetch the latest profile information from the connected platform and update the social account
     *
     * @param string $id
     * @param RefreshProfileSocialAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?RefreshProfileSocialAccountsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function refreshProfile(string $id, RefreshProfileSocialAccountsRequest $request = new RefreshProfileSocialAccountsRequest(), ?array $options = null): ?RefreshProfileSocialAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/social-accounts/{$id}/refresh",
                    method: HttpMethod::PUT,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return RefreshProfileSocialAccountsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SchedulinException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SchedulinException(message: $e->getMessage(), previous: $e);
        }
        throw new SchedulinApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
