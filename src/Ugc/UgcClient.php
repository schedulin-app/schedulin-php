<?php

namespace Schedulin\Ugc;

use Psr\Http\Client\ClientInterface;
use Schedulin\Core\Client\RawClient;
use Schedulin\Ugc\Requests\CreateVideoUgcRequest;
use Schedulin\Ugc\Types\CreateVideoUgcResponse;
use Schedulin\Exceptions\SchedulinException;
use Schedulin\Exceptions\SchedulinApiException;
use Schedulin\Core\Json\JsonApiRequest;
use Schedulin\Environments;
use Schedulin\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Schedulin\Ugc\Requests\GetVideoUgcRequest;
use Schedulin\Ugc\Types\GetVideoUgcResponse;
use Schedulin\Ugc\Requests\AddToMediaLibraryUgcRequest;
use Schedulin\Ugc\Types\AddToMediaLibraryUgcResponse;
use Schedulin\Ugc\Requests\ListAvatarsUgcRequest;
use Schedulin\Ugc\Types\ListAvatarsUgcResponse;

class UgcClient
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
     * Create an AI UGC (talking-actor) video from a brief and start rendering it. Reserves AI credits up front; poll getProject until COMPLETED or FAILED
     *
     * Example:
     * ```php
     * $client->ugc->createVideo(
     *     new CreateVideoUgcRequest([
     *         'productName' => 'productName',
     *     ]),
     * );
     * ```
     *
     * @param CreateVideoUgcRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?CreateVideoUgcResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function createVideo(CreateVideoUgcRequest $request, ?array $options = null): ?CreateVideoUgcResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/studio/ugc/createProject",
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
                return CreateVideoUgcResponse::fromJson($json);
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
     * Get an AI UGC video's status, with signed URLs for the final video and poster once COMPLETED. Pass waitSeconds (max 45) to wait for it to finish before responding
     *
     * Example:
     * ```php
     * $client->ugc->getVideo(
     *     new GetVideoUgcRequest([
     *         'id' => 'id',
     *     ]),
     * );
     * ```
     *
     * @param GetVideoUgcRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?GetVideoUgcResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function getVideo(GetVideoUgcRequest $request, ?array $options = null): ?GetVideoUgcResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['id'] = $request->id;
        if ($request->waitSeconds != null) {
            $query['waitSeconds'] = $request->waitSeconds;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/studio/ugc/getProject",
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
                return GetVideoUgcResponse::fromJson($json);
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
     * Copy a COMPLETED UGC video into the media library and return its permanent URL, ready to attach to a post. Idempotent: repeat calls return the same media
     *
     * Example:
     * ```php
     * $client->ugc->addToMediaLibrary(
     *     new AddToMediaLibraryUgcRequest([
     *         'projectId' => 'projectId',
     *     ]),
     * );
     * ```
     *
     * @param AddToMediaLibraryUgcRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?AddToMediaLibraryUgcResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function addToMediaLibrary(AddToMediaLibraryUgcRequest $request, ?array $options = null): ?AddToMediaLibraryUgcResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/studio/ugc/addToMediaLibrary",
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
                return AddToMediaLibraryUgcResponse::fromJson($json);
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
     * Example:
     * ```php
     * $client->ugc->listAvatars(
     *     new ListAvatarsUgcRequest([]),
     * );
     * ```
     *
     * @param ListAvatarsUgcRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?ListAvatarsUgcResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function listAvatars(ListAvatarsUgcRequest $request = new ListAvatarsUgcRequest(), ?array $options = null): ?ListAvatarsUgcResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->perPage != null) {
            $query['perPage'] = $request->perPage;
        }
        if ($request->sort != null) {
            $query['sort'] = $request->sort;
        }
        if ($request->name != null) {
            $query['name'] = $request->name;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/studio/ugc/avatars/list",
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
                return ListAvatarsUgcResponse::fromJson($json);
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
