<?php

namespace Schedulin\Ugc\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class ListAvatarsUgcRequestSortItem extends JsonSerializableType
{
    /**
     * @var value-of<ListAvatarsUgcRequestSortItemId> $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var bool $desc
     */
    #[JsonProperty('desc')]
    public bool $desc;

    /**
     * @param array{
     *   id: value-of<ListAvatarsUgcRequestSortItemId>,
     *   desc: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->desc = $values['desc'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
