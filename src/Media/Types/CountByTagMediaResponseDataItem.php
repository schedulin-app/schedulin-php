<?php

namespace Schedulin\Media\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class CountByTagMediaResponseDataItem extends JsonSerializableType
{
    /**
     * @var string $tagId
     */
    #[JsonProperty('tagId')]
    public string $tagId;

    /**
     * @var float $count
     */
    #[JsonProperty('count')]
    public float $count;

    /**
     * @param array{
     *   tagId: string,
     *   count: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->tagId = $values['tagId'];
        $this->count = $values['count'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
