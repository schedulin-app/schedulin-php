<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class MediaSetTags extends JsonSerializableType
{
    /**
     * @var string $mediaId
     */
    #[JsonProperty('mediaId')]
    public string $mediaId;

    /**
     * @var array<string> $tagIds
     */
    #[JsonProperty('tagIds'), ArrayType(['string'])]
    public array $tagIds;

    /**
     * @param array{
     *   mediaId: string,
     *   tagIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->mediaId = $values['mediaId'];
        $this->tagIds = $values['tagIds'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
