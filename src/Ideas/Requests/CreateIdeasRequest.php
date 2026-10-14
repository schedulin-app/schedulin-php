<?php

namespace Schedulin\Ideas\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class CreateIdeasRequest extends JsonSerializableType
{
    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $columnId Column to add the idea to; defaults to the first column
     */
    #[JsonProperty('columnId')]
    public ?string $columnId;

    /**
     * @param array{
     *   title: string,
     *   description?: ?string,
     *   columnId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'];
        $this->description = $values['description'] ?? null;
        $this->columnId = $values['columnId'] ?? null;
    }
}
