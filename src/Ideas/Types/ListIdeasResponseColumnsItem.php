<?php

namespace Schedulin\Ideas\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class ListIdeasResponseColumnsItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var int $order
     */
    #[JsonProperty('order')]
    public int $order;

    /**
     * @var bool $isDone The last column on the board; ideas moved here are marked completed
     */
    #[JsonProperty('isDone')]
    public bool $isDone;

    /**
     * @param array{
     *   id: string,
     *   title: string,
     *   order: int,
     *   isDone: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->title = $values['title'];
        $this->order = $values['order'];
        $this->isDone = $values['isDone'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
