<?php

namespace Schedulin\Media\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Types\Media;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListMediaResponse extends JsonSerializableType
{
    /**
     * @var array<Media> $items
     */
    #[JsonProperty('items'), ArrayType([Media::class])]
    public array $items;

    /**
     * @var float $page
     */
    #[JsonProperty('page')]
    public float $page;

    /**
     * @var float $total
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @var float $totalPages
     */
    #[JsonProperty('totalPages')]
    public float $totalPages;

    /**
     * @param array{
     *   items: array<Media>,
     *   page: float,
     *   total: float,
     *   totalPages: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->items = $values['items'];
        $this->page = $values['page'];
        $this->total = $values['total'];
        $this->totalPages = $values['totalPages'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
