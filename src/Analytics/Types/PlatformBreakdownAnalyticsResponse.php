<?php

namespace Schedulin\Analytics\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class PlatformBreakdownAnalyticsResponse extends JsonSerializableType
{
    /**
     * @var array<PlatformBreakdownAnalyticsResponsePlatformsItem> $platforms
     */
    #[JsonProperty('platforms'), ArrayType([PlatformBreakdownAnalyticsResponsePlatformsItem::class])]
    public array $platforms;

    /**
     * @param array{
     *   platforms: array<PlatformBreakdownAnalyticsResponsePlatformsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->platforms = $values['platforms'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
