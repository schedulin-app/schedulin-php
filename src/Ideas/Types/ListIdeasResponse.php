<?php

namespace Schedulin\Ideas\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListIdeasResponse extends JsonSerializableType
{
    /**
     * @var array<ListIdeasResponseColumnsItem> $columns
     */
    #[JsonProperty('columns'), ArrayType([ListIdeasResponseColumnsItem::class])]
    public array $columns;

    /**
     * @var array<ListIdeasResponseIdeasItem> $ideas
     */
    #[JsonProperty('ideas'), ArrayType([ListIdeasResponseIdeasItem::class])]
    public array $ideas;

    /**
     * @param array{
     *   columns: array<ListIdeasResponseColumnsItem>,
     *   ideas: array<ListIdeasResponseIdeasItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->columns = $values['columns'];
        $this->ideas = $values['ideas'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
