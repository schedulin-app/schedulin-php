<?php

namespace Schedulin\Platforms\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListPlatformsResponseDataItemMediaRules extends JsonSerializableType
{
    /**
     * @var ?float $min
     */
    #[JsonProperty('min')]
    public ?float $min;

    /**
     * @var float $max
     */
    #[JsonProperty('max')]
    public float $max;

    /**
     * @var ?array<value-of<ListPlatformsResponseDataItemMediaRulesAllowedTypesItem>> $allowedTypes
     */
    #[JsonProperty('allowedTypes'), ArrayType(['string'])]
    public ?array $allowedTypes;

    /**
     * @param array{
     *   max: float,
     *   min?: ?float,
     *   allowedTypes?: ?array<value-of<ListPlatformsResponseDataItemMediaRulesAllowedTypesItem>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->min = $values['min'] ?? null;
        $this->max = $values['max'];
        $this->allowedTypes = $values['allowedTypes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
