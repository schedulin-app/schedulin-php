<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class MediaSearch extends JsonSerializableType
{
    /**
     * @var ?MediaSearchCursor $cursor
     */
    #[JsonProperty('cursor')]
    public ?MediaSearchCursor $cursor;

    /**
     * @var ?float $limit
     */
    #[JsonProperty('limit')]
    public ?float $limit;

    /**
     * @var ?string $q
     */
    #[JsonProperty('q')]
    public ?string $q;

    /**
     * @var ?value-of<MediaSearchType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?array<string> $tagIds
     */
    #[JsonProperty('tagIds'), ArrayType(['string'])]
    public ?array $tagIds;

    /**
     * @var ?value-of<MediaSearchTagMode> $tagMode
     */
    #[JsonProperty('tagMode')]
    public ?string $tagMode;

    /**
     * @param array{
     *   cursor?: ?MediaSearchCursor,
     *   limit?: ?float,
     *   q?: ?string,
     *   type?: ?value-of<MediaSearchType>,
     *   tagIds?: ?array<string>,
     *   tagMode?: ?value-of<MediaSearchTagMode>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->q = $values['q'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->tagIds = $values['tagIds'] ?? null;
        $this->tagMode = $values['tagMode'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
