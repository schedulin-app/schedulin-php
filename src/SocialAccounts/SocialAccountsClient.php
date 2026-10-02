<?php

namespace Schedulin\SocialAccounts;

use Psr\Http\Client\ClientInterface;
use Schedulin\Core\Client\RawClient;
use Schedulin\SocialAccounts\Types\ListSocialAccountsResponse;
use Schedulin\Exceptions\SchedulinException;
use Schedulin\Exceptions\SchedulinApiException;
use Schedulin\Core\Json\JsonApiRequest;
use Schedulin\Environments;
use Schedulin\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Schedulin\SocialAccounts\Types\ListWhopCompaniesSocialAccountsResponse;
use Schedulin\SocialAccounts\Requests\ListWhopForumsSocialAccountsRequest;
use Schedulin\SocialAccounts\Types\ListWhopForumsSocialAccountsResponse;
use Schedulin\SocialAccounts\Types\ListDiscordChannelsSocialAccountsResponse;
use Schedulin\SocialAccounts\Types\ListSlackChannelsSocialAccountsResponse;
use Schedulin\SocialAccounts\Requests\UpdateSocialAccountsRequest;
use Schedulin\SocialAccounts\Types\UpdateSocialAccountsResponse;
use Schedulin\SocialAccounts\Requests\DeleteSocialAccountsRequest;
use Schedulin\SocialAccounts\Types\DeleteSocialAccountsResponse;
use Schedulin\SocialAccounts\Requests\UpdateTimezoneSocialAccountsRequest;
use Schedulin\SocialAccounts\Types\UpdateTimezoneSocialAccountsResponse;
use Schedulin\SocialAccounts\Requests\NextSlotsSocialAccountsRequest;
use Schedulin\SocialAccounts\Types\NextSlotsSocialAccountsResponse;
use Schedulin\SocialAccounts\Types\PinterestBoardsSocialAccountsResponse;
use Schedulin\SocialAccounts\Types\TiktokCreatorInfoSocialAccountsResponse;

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
     * Example:
     * ```php
     * $client->socialAccounts->list();
     * ```
     *
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSocialAccountsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function list(?array $options = null): ?ListSocialAccountsResponse
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
                return ListSocialAccountsResponse::fromJson($json);
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
     * List companies available to a connected Whop account. Select one before requesting its forum experiences.
     *
     * Example:
     * ```php
     * $client->socialAccounts->listWhopCompanies(
     *     'id',
     * );
     * ```
     *
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListWhopCompaniesSocialAccountsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function listWhopCompanies(string $id, ?array $options = null): ?ListWhopCompaniesSocialAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/social-accounts/{$id}/whop-companies",
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
                return ListWhopCompaniesSocialAccountsResponse::fromJson($json);
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
     * List forum experiences for a Whop company. Use an item id as platformConfiguration.experience.
     *
     * Example:
     * ```php
     * $client->socialAccounts->listWhopForums(
     *     'id',
     *     new ListWhopForumsSocialAccountsRequest([
     *         'companyId' => 'companyId',
     *     ]),
     * );
     * ```
     *
     * @param string $id
     * @param ListWhopForumsSocialAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListWhopForumsSocialAccountsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function listWhopForums(string $id, ListWhopForumsSocialAccountsRequest $request, ?array $options = null): ?ListWhopForumsSocialAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['companyId'] = $request->companyId;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/social-accounts/{$id}/whop-forums",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return ListWhopForumsSocialAccountsResponse::fromJson($json);
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
     * List the text and announcement channels the Schedulin bot can post into for a connected Discord server. Use an item id as `platformConfiguration.channel` when creating a Discord post.
     *
     * Example:
     * ```php
     * $client->socialAccounts->listDiscordChannels(
     *     'id',
     * );
     * ```
     *
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListDiscordChannelsSocialAccountsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function listDiscordChannels(string $id, ?array $options = null): ?ListDiscordChannelsSocialAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/social-accounts/{$id}/discord-channels",
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
                return ListDiscordChannelsSocialAccountsResponse::fromJson($json);
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
     * List the channels in a connected Slack workspace that the Schedulin bot can post into (public channels, plus private channels it was invited to). Use an item id as `platformConfiguration.channel` when creating a Slack post.
     *
     * Example:
     * ```php
     * $client->socialAccounts->listSlackChannels(
     *     'id',
     * );
     * ```
     *
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListSlackChannelsSocialAccountsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function listSlackChannels(string $id, ?array $options = null): ?ListSlackChannelsSocialAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/social-accounts/{$id}/slack-channels",
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
                return ListSlackChannelsSocialAccountsResponse::fromJson($json);
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
     * Example:
     * ```php
     * $client->socialAccounts->update(
     *     'id',
     *     new UpdateSocialAccountsRequest([]),
     * );
     * ```
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
     * Example:
     * ```php
     * $client->socialAccounts->delete(
     *     'id',
     *     new DeleteSocialAccountsRequest([]),
     * );
     * ```
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
     * Set the IANA timezone (e.g. 'America/Los_Angeles') used to interpret queue times for this account. Unknown names and UTC-offset strings (e.g. '+05:00') are rejected with 422.
     *
     * Example:
     * ```php
     * $client->socialAccounts->updateTimezone(
     *     'id',
     *     new UpdateTimezoneSocialAccountsRequest([
     *         'timezone' => 'timezone',
     *     ]),
     * );
     * ```
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
     * Return the next available queue slot times (UTC) for a social account, computed from its queue schedule, per-slot capacity, and timezone. Empty when the account has no queue times configured. Use a slot as `scheduledAt`, or pass `action: "queue"` when creating a post to take the next slot automatically.
     *
     * Example:
     * ```php
     * $client->socialAccounts->nextSlots(
     *     'id',
     *     new NextSlotsSocialAccountsRequest([]),
     * );
     * ```
     *
     * @param string $id
     * @param NextSlotsSocialAccountsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?NextSlotsSocialAccountsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function nextSlots(string $id, NextSlotsSocialAccountsRequest $request = new NextSlotsSocialAccountsRequest(), ?array $options = null): ?NextSlotsSocialAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->after != null) {
            $query['after'] = $request->after;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/social-accounts/{$id}/next-slots",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                if (empty($json)) {
                    return null;
                }
                return NextSlotsSocialAccountsResponse::fromJson($json);
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
     * List the boards for a connected Pinterest account. Use a board id in `platformConfiguration.board_ids` when creating a Pinterest post.
     *
     * Example:
     * ```php
     * $client->socialAccounts->pinterestBoards(
     *     'id',
     * );
     * ```
     *
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PinterestBoardsSocialAccountsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function pinterestBoards(string $id, ?array $options = null): ?PinterestBoardsSocialAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/social-accounts/{$id}/pinterest-boards",
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
                return PinterestBoardsSocialAccountsResponse::fromJson($json);
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
     * Fetch the privacy-level options, duration limits, and interaction settings for a connected TikTok account — required to build a valid `platformConfiguration` when creating a TikTok post.
     *
     * Example:
     * ```php
     * $client->socialAccounts->tiktokCreatorInfo(
     *     'id',
     * );
     * ```
     *
     * @param string $id
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?TiktokCreatorInfoSocialAccountsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function tiktokCreatorInfo(string $id, ?array $options = null): ?TiktokCreatorInfoSocialAccountsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/social-accounts/{$id}/tiktok-creator-info",
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
                return TiktokCreatorInfoSocialAccountsResponse::fromJson($json);
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
