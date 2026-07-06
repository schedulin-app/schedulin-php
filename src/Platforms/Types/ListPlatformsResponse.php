<?php

namespace Schedulin\Platforms\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListPlatformsResponse extends JsonSerializableType
{
    /**
     * @var array<ListPlatformsResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([ListPlatformsResponseDataItem::class])]
    public array $data;

    /**
     * @param array{
     *   data: array<ListPlatformsResponseDataItem>,
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
