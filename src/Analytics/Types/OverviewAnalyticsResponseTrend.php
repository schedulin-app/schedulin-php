<?php

namespace Schedulin\Analytics\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

/**
 * Percent change vs the previous window of the same length; null when the previous window was zero
 */
class OverviewAnalyticsResponseTrend extends JsonSerializableType
{
    /**
     * @var ?float $impressions
     */
    #[JsonProperty('impressions')]
    public ?float $impressions;

    /**
     * @var ?float $engagement
     */
    #[JsonProperty('engagement')]
    public ?float $engagement;

    /**
     * @var ?float $likes
     */
    #[JsonProperty('likes')]
    public ?float $likes;

    /**
     * @var ?float $audience
     */
    #[JsonProperty('audience')]
    public ?float $audience;

    /**
     * @param array{
     *   impressions?: ?float,
     *   engagement?: ?float,
     *   likes?: ?float,
     *   audience?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->impressions = $values['impressions'] ?? null;
        $this->engagement = $values['engagement'] ?? null;
        $this->likes = $values['likes'] ?? null;
        $this->audience = $values['audience'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
