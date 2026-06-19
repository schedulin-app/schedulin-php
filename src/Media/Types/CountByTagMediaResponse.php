<?php

namespace Schedulin\Media\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class CountByTagMediaResponse extends JsonSerializableType
{
    /**
     * @var array<CountByTagMediaResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([CountByTagMediaResponseDataItem::class])]
    public array $data;

    /**
     * @param array{
     *   data: array<CountByTagMediaResponseDataItem>,
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
