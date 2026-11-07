<?php

namespace Schedulin\Ugc\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListAvatarsUgcResponse extends JsonSerializableType
{
    /**
     * @var array<ListAvatarsUgcResponseItemsItem> $items
     */
    #[JsonProperty('items'), ArrayType([ListAvatarsUgcResponseItemsItem::class])]
    public array $items;

    /**
     * @var int $total
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @var int $pageCount
     */
    #[JsonProperty('pageCount')]
    public int $pageCount;

    /**
     * @param array{
     *   items: array<ListAvatarsUgcResponseItemsItem>,
     *   total: int,
     *   pageCount: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->items = $values['items'];
        $this->total = $values['total'];
        $this->pageCount = $values['pageCount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
