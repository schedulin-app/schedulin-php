<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;

class AnalyticsSummaryPostsResponse extends JsonSerializableType
{
    /**
     * @var mixed $analyticsLatest
     */
    #[JsonProperty('analyticsLatest')]
    public mixed $analyticsLatest;

    /**
     * @var ?DateTime $analyticsLastFetchedAt
     */
    #[JsonProperty('analyticsLastFetchedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $analyticsLastFetchedAt;

    /**
     * @var ?DateTime $analyticsNextFetchAt
     */
    #[JsonProperty('analyticsNextFetchAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $analyticsNextFetchAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   updatedAt: DateTime,
     *   analyticsLatest?: mixed,
     *   analyticsLastFetchedAt?: ?DateTime,
     *   analyticsNextFetchAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->analyticsLatest = $values['analyticsLatest'] ?? null;
        $this->analyticsLastFetchedAt = $values['analyticsLastFetchedAt'] ?? null;
        $this->analyticsNextFetchAt = $values['analyticsNextFetchAt'] ?? null;
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
