<?php

namespace Schedulin\Analytics\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Analytics\Types\TopPostsAnalyticsRequestPlatformsItem;
use Schedulin\Analytics\Types\TopPostsAnalyticsRequestMetric;

class TopPostsAnalyticsRequest extends JsonSerializableType
{
    /**
     * @var string $from
     */
    public string $from;

    /**
     * @var string $to
     */
    public string $to;

    /**
     * @var ?array<value-of<TopPostsAnalyticsRequestPlatformsItem>> $platforms
     */
    public ?array $platforms;

    /**
     * @var ?array<string> $socialAccountIds
     */
    public ?array $socialAccountIds;

    /**
     * @var ?value-of<TopPostsAnalyticsRequestMetric> $metric
     */
    public ?string $metric;

    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @param array{
     *   from: string,
     *   to: string,
     *   platforms?: ?array<value-of<TopPostsAnalyticsRequestPlatformsItem>>,
     *   socialAccountIds?: ?array<string>,
     *   metric?: ?value-of<TopPostsAnalyticsRequestMetric>,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->from = $values['from'];
        $this->to = $values['to'];
        $this->platforms = $values['platforms'] ?? null;
        $this->socialAccountIds = $values['socialAccountIds'] ?? null;
        $this->metric = $values['metric'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }
}
