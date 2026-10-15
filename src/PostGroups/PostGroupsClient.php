<?php

namespace Schedulin\PostGroups;

use Psr\Http\Client\ClientInterface;
use Schedulin\Core\Client\RawClient;
use Schedulin\PostGroups\Requests\CreatePostGroupsRequest;
use Schedulin\PostGroups\Types\CreatePostGroupsResponse;
use Schedulin\Exceptions\SchedulinException;
use Schedulin\Exceptions\SchedulinApiException;
use Schedulin\Core\Json\JsonApiRequest;
use Schedulin\Environments;
use Schedulin\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;

class PostGroupsClient
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
     * Create posts for several social accounts in one request — for example the same caption and image sent to Instagram, Threads and Facebook. Each post is validated exactly like `POST /v0/posts` (including per-platform rules), and media may reference stored library URLs or publicly reachable URLs; an external URL shared by several posts is imported once. The request is atomic: if any post is invalid, nothing is created. Posts with `action: "queue"` on the same account take consecutive queue slots. Up to 50 posts per request.
     *
     * Example:
     * ```php
     * $client->postGroups->create(
     *     new CreatePostGroupsRequest([
     *         'posts' => [
     *             new PostCreate([
     *                 'caption' => 'caption',
     *                 'socialAccountId' => 'socialAccountId',
     *             ]),
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param CreatePostGroupsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreatePostGroupsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function create(CreatePostGroupsRequest $request, ?array $options = null): ?CreatePostGroupsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/post-groups",
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
                return CreatePostGroupsResponse::fromJson($json);
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
