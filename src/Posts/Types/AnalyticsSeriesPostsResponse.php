<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class AnalyticsSeriesPostsResponse extends JsonSerializableType
{
    /**
     * @var array<AnalyticsSeriesPostsResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([AnalyticsSeriesPostsResponseDataItem::class])]
    public array $data;

    /**
     * @param array{
     *   data: array<AnalyticsSeriesPostsResponseDataItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
