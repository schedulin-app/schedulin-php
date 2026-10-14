<?php

namespace Schedulin\Analytics\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class OverviewAnalyticsResponse extends JsonSerializableType
{
    /**
     * @var OverviewAnalyticsResponseTotals $totals
     */
    #[JsonProperty('totals')]
    public OverviewAnalyticsResponseTotals $totals;

    /**
     * @var OverviewAnalyticsResponseTrend $trend Percent change vs the previous window of the same length: 0 when both windows are zero, null when only the previous window is zero
     */
    #[JsonProperty('trend')]
    public OverviewAnalyticsResponseTrend $trend;

    /**
     * @param array{
     *   totals: OverviewAnalyticsResponseTotals,
     *   trend: OverviewAnalyticsResponseTrend,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->totals = $values['totals'];
        $this->trend = $values['trend'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
