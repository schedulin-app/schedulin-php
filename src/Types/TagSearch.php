<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class TagSearch extends JsonSerializableType
{
    /**
     * @var ?string $q
     */
    #[JsonProperty('q')]
    public ?string $q;

    /**
     * @var ?float $limit
     */
    #[JsonProperty('limit')]
    public ?float $limit;

    /**
     * @param array{
     *   q?: ?string,
     *   limit?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->q = $values['q'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
