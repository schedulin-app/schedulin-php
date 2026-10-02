<?php

namespace Schedulin\Media\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Media\Types\ListMediaRequestType;
use Schedulin\Media\Types\ListMediaRequestTagMode;

class ListMediaRequest extends JsonSerializableType
{
    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?int $limit
     */
    public ?int $limit;

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
     *   page?: ?int,
     *   limit?: ?int,
     *   q?: ?string,
     *   type?: ?value-of<ListMediaRequestType>,
     *   tagIds?: ?array<string>,
     *   tagMode?: ?value-of<ListMediaRequestTagMode>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->q = $values['q'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->tagIds = $values['tagIds'] ?? null;
        $this->tagMode = $values['tagMode'] ?? null;
    }
}
