<?php

namespace Schedulin\Platforms\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListPlatformsResponseDataItemMediaRules extends JsonSerializableType
{
    /**
     * @var ?int $min
     */
    #[JsonProperty('min')]
    public ?int $min;

    /**
     * @var int $max
     */
    #[JsonProperty('max')]
    public int $max;

    /**
     * @var ?array<value-of<ListPlatformsResponseDataItemMediaRulesAllowedTypesItem>> $allowedTypes
     */
    #[JsonProperty('allowedTypes'), ArrayType(['string'])]
    public ?array $allowedTypes;

    /**
     * @var ?array<ListPlatformsResponseDataItemMediaRulesAllowedDimensionsItem> $allowedDimensions
     */
    #[JsonProperty('allowedDimensions'), ArrayType([ListPlatformsResponseDataItemMediaRulesAllowedDimensionsItem::class])]
    public ?array $allowedDimensions;

    /**
     * @param array{
     *   max: int,
     *   min?: ?int,
     *   allowedTypes?: ?array<value-of<ListPlatformsResponseDataItemMediaRulesAllowedTypesItem>>,
     *   allowedDimensions?: ?array<ListPlatformsResponseDataItemMediaRulesAllowedDimensionsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->min = $values['min'] ?? null;
        $this->max = $values['max'];
        $this->allowedTypes = $values['allowedTypes'] ?? null;
        $this->allowedDimensions = $values['allowedDimensions'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
