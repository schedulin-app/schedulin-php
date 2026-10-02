<?php

namespace Schedulin\Posts;

use Psr\Http\Client\ClientInterface;
use Schedulin\Core\Client\RawClient;
use Schedulin\Posts\Requests\ListPostsRequest;
use Schedulin\Posts\Types\ListPostsResponse;
use Schedulin\Exceptions\SchedulinException;
use Schedulin\Exceptions\SchedulinApiException;
use Schedulin\Core\Json\JsonApiRequest;
use Schedulin\Environments;
use Schedulin\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Schedulin\Posts\Requests\PostCreate;
use Schedulin\Posts\Types\CreatePostsResponse;
use Schedulin\Posts\Requests\CountByTabPostsRequest;
use Schedulin\Posts\Types\CountByTabPostsResponse;
use Schedulin\Types\PostWithRelations;
use Schedulin\Posts\Requests\UpdatePostsRequest;
use Schedulin\Types\Post;
use Schedulin\Posts\Requests\DeletePostsRequest;
use Schedulin\Posts\Types\AnalyticsSummaryPostsResponse;
use Schedulin\Posts\Requests\AnalyticsSeriesPostsRequest;
use Schedulin\Posts\Types\AnalyticsSeriesPostsResponse;
use Schedulin\Posts\Requests\PublishDraftPostsRequest;
use Schedulin\Posts\Requests\UpdateTagsPostsRequest;

class PostsClient
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
     * Search and filter posts with various criteria including status, date range, social accounts, and tags
     *
     * Example:
     * ```php
     * $client->posts->list(
     *     new ListPostsRequest([]),
     * );
     * ```
     *
     * @param ListPostsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListPostsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function list(ListPostsRequest $request = new ListPostsRequest(), ?array $options = null): ?ListPostsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->statuses != null) {
            $query['statuses'] = $request->statuses;
        }
        if ($request->approvalStatus != null) {
            $query['approvalStatus'] = $request->approvalStatus;
        }
        if ($request->scheduledAt != null) {
            $query['scheduledAt'] = $request->scheduledAt;
        }
        if ($request->tagIds != null) {
            $query['tagIds'] = $request->tagIds;
        }
        if ($request->tagMode != null) {
            $query['tagMode'] = $request->tagMode;
        }
        if ($request->socialAccountIds != null) {
            $query['socialAccountIds'] = $request->socialAccountIds;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/posts",
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
                return ListPostsResponse::fromJson($json);
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
     * Create a new post with media, tags, and scheduling options. Media items may reference a stored library URL or any publicly reachable image/video URL — external URLs are downloaded into the media library automatically, so clients that cannot issue a raw presigned PUT can attach media in one call.
     *
     * Example:
     * ```php
     * $client->posts->create(
     *     new PostCreate([
     *         'caption' => 'caption',
     *         'socialAccountId' => 'socialAccountId',
     *     ]),
     * );
     * ```
     *
     * @param PostCreate $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreatePostsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function create(PostCreate $request, ?array $options = null): ?CreatePostsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/posts",
                    method: HttpMethod::POST,
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
                return CreatePostsResponse::fromJson($json);
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
     * Returns counts of posts for the Queue, Drafts, Approvals, and Sent tabs
     *
     * Example:
     * ```php
     * $client->posts->countByTab(
     *     new CountByTabPostsRequest([]),
     * );
     * ```
     *
     * @param CountByTabPostsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CountByTabPostsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function countByTab(CountByTabPostsRequest $request = new CountByTabPostsRequest(), ?array $options = null): ?CountByTabPostsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->socialAccountIds != null) {
            $query['socialAccountIds'] = $request->socialAccountIds;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/posts/counts/by-tab",
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
                return CountByTabPostsResponse::fromJson($json);
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
     * Retrieve a single post by its ID with all relations
     *
     * Example:
     * ```php
     * $client->posts->retrieve(
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
     * @return ?PostWithRelations
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function retrieve(string $id, ?array $options = null): ?PostWithRelations
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/posts/{$id}",
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
                return PostWithRelations::fromJson($json);
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
     * Update an existing draft or scheduled post by its ID. `status` may be DRAFT, SCHEDULED (requires a future `scheduledAt`, either in this request or already on the post), or PROCESSING (publish now). COMPLETED and FAILED are set only by the publisher. A new `scheduledAt` must not be in the past, whatever the status (422). `media` replaces the post's media and accepts the same items as create — a stored or public URL (`{ url }`) or a media library id (`{ id }`), so the `media` array from `GET /v0/posts/{id}` can be sent back as-is. `parts` (X and Mastodon only) replaces the post's thread with the same items create accepts — part media may also be a library `{ id }`, so the `parts` array from `GET /v0/posts/{id}` round-trips — and an empty array removes the thread. On X, parts[0] is the opening tweet: sending `parts` without `caption` sets the caption to parts[0], and changing `caption` without `parts` updates parts[0] when it matched the old caption. Posts that are already publishing, published, or failed can't be edited (409).
     *
     * Example:
     * ```php
     * $client->posts->update(
     *     'id',
     *     new UpdatePostsRequest([]),
     * );
     * ```
     *
     * @param string $id
     * @param UpdatePostsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Post
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function update(string $id, UpdatePostsRequest $request = new UpdatePostsRequest(), ?array $options = null): ?Post
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/posts/{$id}",
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
                return Post::fromJson($json);
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
     * Delete a post by its ID
     *
     * Example:
     * ```php
     * $client->posts->delete(
     *     'id',
     *     new DeletePostsRequest([]),
     * );
     * ```
     *
     * @param string $id
     * @param DeletePostsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Post
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function delete(string $id, DeletePostsRequest $request = new DeletePostsRequest(), ?array $options = null): ?Post
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/posts/{$id}",
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
                return Post::fromJson($json);
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
     * Retrieve the latest analytics snapshot for a post
     *
     * Example:
     * ```php
     * $client->posts->analyticsSummary(
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
     * @return ?AnalyticsSummaryPostsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function analyticsSummary(string $id, ?array $options = null): ?AnalyticsSummaryPostsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/posts/{$id}/analytics/summary",
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
                return AnalyticsSummaryPostsResponse::fromJson($json);
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
     * Retrieve time series analytics metrics for a post
     *
     * Example:
     * ```php
     * $client->posts->analyticsSeries(
     *     'id',
     *     new AnalyticsSeriesPostsRequest([]),
     * );
     * ```
     *
     * @param string $id
     * @param AnalyticsSeriesPostsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AnalyticsSeriesPostsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function analyticsSeries(string $id, AnalyticsSeriesPostsRequest $request = new AnalyticsSeriesPostsRequest(), ?array $options = null): ?AnalyticsSeriesPostsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/posts/{$id}/analytics/series",
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
                return AnalyticsSeriesPostsResponse::fromJson($json);
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
     * Publish a draft post to connected social media accounts
     *
     * Example:
     * ```php
     * $client->posts->publishDraft(
     *     'id',
     *     new PublishDraftPostsRequest([]),
     * );
     * ```
     *
     * @param string $id
     * @param PublishDraftPostsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Post
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function publishDraft(string $id, PublishDraftPostsRequest $request = new PublishDraftPostsRequest(), ?array $options = null): ?Post
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/posts/{$id}/publish",
                    method: HttpMethod::POST,
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
                return Post::fromJson($json);
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
     * Replace all tags on a post. No status restrictions apply.
     *
     * Example:
     * ```php
     * $client->posts->updateTags(
     *     'id',
     *     new UpdateTagsPostsRequest([
     *         'tagIds' => [
     *             'tagIds',
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param string $id
     * @param UpdateTagsPostsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?Post
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function updateTags(string $id, UpdateTagsPostsRequest $request, ?array $options = null): ?Post
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/posts/{$id}/tags",
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
                return Post::fromJson($json);
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
