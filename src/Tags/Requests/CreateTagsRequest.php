<?php

namespace Schedulin\Tags\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class CreateTagsRequest extends JsonSerializableType
{
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
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->color = $values['color'];
    }
}
