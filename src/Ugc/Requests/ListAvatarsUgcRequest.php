<?php

namespace Schedulin\Ugc\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Ugc\Types\ListAvatarsUgcRequestSortItem;

class ListAvatarsUgcRequest extends JsonSerializableType
{
    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?int $perPage
     */
    public ?int $perPage;

    /**
     * @var ?array<ListAvatarsUgcRequestSortItem> $sort
     */
    public ?array $sort;

    /**
     * @var ?string $name
     */
    public ?string $name;

    /**
     * @var ?array<string> $status
     */
    public ?array $status;

    /**
     * @param array{
     *   page?: ?int,
     *   perPage?: ?int,
     *   sort?: ?array<ListAvatarsUgcRequestSortItem>,
     *   name?: ?string,
     *   status?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
        $this->sort = $values['sort'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->status = $values['status'] ?? null;
    }
}
