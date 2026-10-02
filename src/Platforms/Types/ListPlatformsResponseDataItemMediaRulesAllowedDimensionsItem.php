<?php

namespace Schedulin\Platforms\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class ListPlatformsResponseDataItemMediaRulesAllowedDimensionsItem extends JsonSerializableType
{
    /**
     * @var int $width
     */
    #[JsonProperty('width')]
    public int $width;

    /**
     * @var int $height
     */
    #[JsonProperty('height')]
    public int $height;

    /**
     * @param array{
     *   width: int,
     *   height: int,
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
