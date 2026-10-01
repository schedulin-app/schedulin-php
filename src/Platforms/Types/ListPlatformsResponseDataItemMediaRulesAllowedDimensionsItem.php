<?php

namespace Schedulin\Platforms\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class ListPlatformsResponseDataItemMediaRulesAllowedDimensionsItem extends JsonSerializableType
{
    /**
     * @var float $width
     */
    #[JsonProperty('width')]
    public float $width;

    /**
     * @var float $height
     */
    #[JsonProperty('height')]
    public float $height;

    /**
     * @param array{
     *   width: float,
     *   height: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->width = $values['width'];
        $this->height = $values['height'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
