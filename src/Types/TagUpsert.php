<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class TagUpsert extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $color
     */
    #[JsonProperty('color')]
    public string $color;

    /**
     * @param array{
     *   name: string,
     *   color: string,
     *   id?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'];
        $this->color = $values['color'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
