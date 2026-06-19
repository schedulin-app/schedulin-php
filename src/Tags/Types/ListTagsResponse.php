<?php

namespace Schedulin\Tags\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Types\Tag;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListTagsResponse extends JsonSerializableType
{
    /**
     * @var array<Tag> $data
     */
    #[JsonProperty('data'), ArrayType([Tag::class])]
    public array $data;

    /**
     * @param array{
     *   data: array<Tag>,
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
