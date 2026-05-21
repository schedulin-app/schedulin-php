<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesPoll extends JsonSerializableType
{
    /**
     * @var ?string $question
     */
    #[JsonProperty('question')]
    public ?string $question;

    /**
     * @var array<string> $options
     */
    #[JsonProperty('options'), ArrayType(['string'])]
    public array $options;

    /**
     * @param array{
     *   options: array<string>,
     *   question?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->question = $values['question'] ?? null;
        $this->options = $values['options'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
