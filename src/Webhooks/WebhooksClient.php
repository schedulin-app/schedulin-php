<?php

namespace Schedulin\Webhooks;

use Psr\Http\Client\ClientInterface;
use Schedulin\Core\Client\RawClient;
use Schedulin\Exceptions\SchedulinException;
use Schedulin\Exceptions\SchedulinApiException;
use Schedulin\Core\Json\JsonApiRequest;
use Schedulin\Environments;
use Schedulin\Core\Client\HttpMethod;
use Schedulin\Core\Json\JsonDecoder;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Schedulin\Webhooks\Requests\CreateWebhooksRequest;
use Schedulin\Webhooks\Requests\DeleteWebhooksRequest;
use Schedulin\Webhooks\Requests\UpdateWebhooksRequest;
use Schedulin\Webhooks\Requests\RotateSecretWebhooksRequest;
use Schedulin\Webhooks\Requests\TestWebhooksRequest;
use Schedulin\Webhooks\Requests\ListDeliveriesWebhooksRequest;

class WebhooksClient
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
     * List the organization's webhook endpoints. Signing secrets are masked.
     *
     * Example:
     * ```php
     * $client->webhooks->list();
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
     * @return mixed
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function list(?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/webhooks",
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
                return JsonDecoder::decodeMixed($json);
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
     * Register an HTTPS endpoint for event deliveries. The response includes the signing secret ONCE — store it; later reads return a masked value.
     *
     * Example:
     * ```php
     * $client->webhooks->create(
     *     new CreateWebhooksRequest([
     *         'url' => 'url',
     *         'events' => [
     *             CreateWebhooksRequestEventsItem::PostPublished->value,
     *         ],
     *     ]),
     * );
     * ```
     *
     * @param CreateWebhooksRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return mixed
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function create(CreateWebhooksRequest $request, ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/webhooks",
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
                return JsonDecoder::decodeMixed($json);
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
     * Retrieve one webhook endpoint, including failure counters. The signing secret is masked.
     *
     * Example:
     * ```php
     * $client->webhooks->retrieve(
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
     * @return mixed
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function retrieve(string $id, ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/webhooks/{$id}",
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
                return JsonDecoder::decodeMixed($json);
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
     * Delete a webhook endpoint and its delivery history. Deliveries already in flight are dropped.
     *
     * Example:
     * ```php
     * $client->webhooks->delete(
     *     'id',
     *     new DeleteWebhooksRequest([]),
     * );
     * ```
     *
     * @param string $id
     * @param DeleteWebhooksRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return mixed
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function delete(string $id, DeleteWebhooksRequest $request = new DeleteWebhooksRequest(), ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/webhooks/{$id}",
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
                return JsonDecoder::decodeMixed($json);
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
     * Update URL, subscribed events, description, or enabled state. Re-enabling resets the failure streak.
     *
     * Example:
     * ```php
     * $client->webhooks->update(
     *     'id',
     *     new UpdateWebhooksRequest([]),
     * );
     * ```
     *
     * @param string $id
     * @param UpdateWebhooksRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return mixed
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function update(string $id, UpdateWebhooksRequest $request = new UpdateWebhooksRequest(), ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/webhooks/{$id}",
                    method: HttpMethod::PATCH,
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
                return JsonDecoder::decodeMixed($json);
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
     * Generate a new signing secret for the endpoint and return it ONCE. The old secret stops signing immediately.
     *
     * Example:
     * ```php
     * $client->webhooks->rotateSecret(
     *     'id',
     *     new RotateSecretWebhooksRequest([]),
     * );
     * ```
     *
     * @param string $id
     * @param RotateSecretWebhooksRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return mixed
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function rotateSecret(string $id, RotateSecretWebhooksRequest $request = new RotateSecretWebhooksRequest(), ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/webhooks/{$id}/rotate-secret",
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
                return JsonDecoder::decodeMixed($json);
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
     * Send a signed `ping` event to the endpoint URL and record it in the delivery history.
     *
     * Example:
     * ```php
     * $client->webhooks->test(
     *     'id',
     *     new TestWebhooksRequest([]),
     * );
     * ```
     *
     * @param string $id
     * @param TestWebhooksRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return mixed
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function test(string $id, TestWebhooksRequest $request = new TestWebhooksRequest(), ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/webhooks/{$id}/test",
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
                return JsonDecoder::decodeMixed($json);
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
     * Delivery history for a webhook endpoint: event, status, attempts, last response code, and payload.
     *
     * Example:
     * ```php
     * $client->webhooks->listDeliveries(
     *     'id',
     *     new ListDeliveriesWebhooksRequest([]),
     * );
     * ```
     *
     * @param string $id
     * @param ListDeliveriesWebhooksRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return mixed
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function listDeliveries(string $id, ListDeliveriesWebhooksRequest $request = new ListDeliveriesWebhooksRequest(), ?array $options = null): mixed
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/webhooks/{$id}/deliveries",
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
                return JsonDecoder::decodeMixed($json);
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
