<?php

namespace Schedulin\Posts\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class V0PostCountByTabRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $socialAccountIds
     */
    public ?array $socialAccountIds;

    /**
     * @param array{
     *   socialAccountIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->socialAccountIds = $values['socialAccountIds'] ?? null;
    }
}
