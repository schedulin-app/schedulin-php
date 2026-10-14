<?php

namespace Schedulin\Analytics;

use Psr\Http\Client\ClientInterface;
use Schedulin\Core\Client\RawClient;
use Schedulin\Analytics\Requests\OverviewAnalyticsRequest;
use Schedulin\Analytics\Types\OverviewAnalyticsResponse;
use Schedulin\Exceptions\SchedulinException;
use Schedulin\Exceptions\SchedulinApiException;
use Schedulin\Core\Json\JsonApiRequest;
use Schedulin\Environments;
use Schedulin\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Schedulin\Analytics\Requests\PlatformBreakdownAnalyticsRequest;
use Schedulin\Analytics\Types\PlatformBreakdownAnalyticsResponse;
use Schedulin\Analytics\Requests\TopPostsAnalyticsRequest;
use Schedulin\Analytics\Types\TopPostsAnalyticsResponse;

class AnalyticsClient
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
     * Aggregate engagement totals (impressions, reach, likes, comments, shares, saves, video views, clicks, engagement), follower audience and posts published for the window, plus percent change vs the previous window of the same length. Covers posts published from the workspace's connected accounts. Filter with `platforms` and `socialAccountIds`; `from`/`to` may span up to 400 days. Metrics are collected periodically per post, so the most recent hours may still be filling in.
     *
     * Example:
     * ```php
     * $client->analytics->overview(
     *     new OverviewAnalyticsRequest([
     *         'from' => 'from',
     *         'to' => 'to',
     *     ]),
     * );
     * ```
     *
     * @param OverviewAnalyticsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?OverviewAnalyticsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function overview(OverviewAnalyticsRequest $request, ?array $options = null): ?OverviewAnalyticsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['from'] = $request->from;
        $query['to'] = $request->to;
        if ($request->platforms != null) {
            $query['platforms'] = $request->platforms;
        }
        if ($request->socialAccountIds != null) {
            $query['socialAccountIds'] = $request->socialAccountIds;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/analytics/overview",
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
                return OverviewAnalyticsResponse::fromJson($json);
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
     * Engagement totals for the window grouped by platform, highest engagement first. Covers posts published from the workspace's connected accounts. Filter with `platforms` and `socialAccountIds`; `from`/`to` may span up to 400 days. Metrics are collected periodically per post, so the most recent hours may still be filling in.
     *
     * Example:
     * ```php
     * $client->analytics->platformBreakdown(
     *     new PlatformBreakdownAnalyticsRequest([
     *         'from' => 'from',
     *         'to' => 'to',
     *     ]),
     * );
     * ```
     *
     * @param PlatformBreakdownAnalyticsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?PlatformBreakdownAnalyticsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function platformBreakdown(PlatformBreakdownAnalyticsRequest $request, ?array $options = null): ?PlatformBreakdownAnalyticsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['from'] = $request->from;
        $query['to'] = $request->to;
        if ($request->platforms != null) {
            $query['platforms'] = $request->platforms;
        }
        if ($request->socialAccountIds != null) {
            $query['socialAccountIds'] = $request->socialAccountIds;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/analytics/platforms",
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
                return PlatformBreakdownAnalyticsResponse::fromJson($json);
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
     * Posts ranked by `metric` (default `engagementTotal`) accumulated within the window. Covers posts published from the workspace's connected accounts. Filter with `platforms` and `socialAccountIds`; `from`/`to` may span up to 400 days. Metrics are collected periodically per post, so the most recent hours may still be filling in.
     *
     * Example:
     * ```php
     * $client->analytics->topPosts(
     *     new TopPostsAnalyticsRequest([
     *         'from' => 'from',
     *         'to' => 'to',
     *     ]),
     * );
     * ```
     *
     * @param TopPostsAnalyticsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return ?TopPostsAnalyticsResponse
     * @throws SchedulinException
     * @throws SchedulinApiException
     */
    public function topPosts(TopPostsAnalyticsRequest $request, ?array $options = null): ?TopPostsAnalyticsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['from'] = $request->from;
        $query['to'] = $request->to;
        if ($request->platforms != null) {
            $query['platforms'] = $request->platforms;
        }
        if ($request->socialAccountIds != null) {
            $query['socialAccountIds'] = $request->socialAccountIds;
        }
        if ($request->metric != null) {
            $query['metric'] = $request->metric;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v0/analytics/top-posts",
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
                return TopPostsAnalyticsResponse::fromJson($json);
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
