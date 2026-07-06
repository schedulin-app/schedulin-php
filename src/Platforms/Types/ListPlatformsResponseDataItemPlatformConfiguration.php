<?php

namespace Schedulin\Platforms\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListPlatformsResponseDataItemPlatformConfiguration extends JsonSerializableType
{
    /**
     * @var bool $required
     */
    #[JsonProperty('required')]
    public bool $required;

    /**
     * @var bool $validated
     */
    #[JsonProperty('validated')]
    public bool $validated;

    /**
     * @var ?array<string, mixed> $schema
     */
    #[JsonProperty('schema'), ArrayType(['string' => 'mixed'])]
    public ?array $schema;

    /**
     * @param array{
     *   required: bool,
     *   validated: bool,
     *   schema?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->required = $values['required'];
        $this->validated = $values['validated'];
        $this->schema = $values['schema'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
