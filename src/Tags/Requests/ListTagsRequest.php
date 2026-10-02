<?php

namespace Schedulin\Tags\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class ListTagsRequest extends JsonSerializableType
{
    /**
     * @var ?string $q
     */
    public ?string $q;

    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @param array{
     *   q?: ?string,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->q = $values['q'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }
}
