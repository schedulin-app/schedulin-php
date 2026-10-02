<?php

namespace Schedulin\Ai\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class GenerateImageAiResponse extends JsonSerializableType
{
    /**
     * @var string $generationId
     */
    #[JsonProperty('generationId')]
    public string $generationId;

    /**
     * @param array{
     *   generationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->generationId = $values['generationId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
