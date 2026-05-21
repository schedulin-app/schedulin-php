<?php

namespace Schedulin\Media\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Media\Types\ListMediaRequestCursor;
use Schedulin\Media\Types\ListMediaRequestType;
use Schedulin\Media\Types\ListMediaRequestTagMode;

class ListMediaRequest extends JsonSerializableType
{
    /**
     * @var ?ListMediaRequestCursor $cursor
     */
    public ?ListMediaRequestCursor $cursor;

    /**
     * @var ?float $limit
     */
    public ?float $limit;

    /**
     * @var ?string $q
     */
    public ?string $q;

    /**
     * @var ?value-of<ListMediaRequestType> $type
     */
    public ?string $type;

    /**
     * @var ?array<string> $tagIds
     */
    public ?array $tagIds;

    /**
     * @var ?value-of<ListMediaRequestTagMode> $tagMode
     */
    public ?string $tagMode;

    /**
     * @param array{
     *   cursor?: ?ListMediaRequestCursor,
     *   limit?: ?float,
     *   q?: ?string,
     *   type?: ?value-of<ListMediaRequestType>,
     *   tagIds?: ?array<string>,
     *   tagMode?: ?value-of<ListMediaRequestTagMode>,
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
}
