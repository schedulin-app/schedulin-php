<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class CreatePostsResponsePlatformConfigurationArticlePoll extends JsonSerializableType
{
    /**
     * @var string $question
     */
    #[JsonProperty('question')]
    public string $question;

    /**
     * @var array<string> $options
     */
    #[JsonProperty('options'), ArrayType(['string'])]
    public array $options;

    /**
     * @var ?value-of<CreatePostsResponsePlatformConfigurationArticlePollDuration> $duration
     */
    #[JsonProperty('duration')]
    public ?string $duration;

    /**
     * @param array{
     *   question: string,
     *   options: array<string>,
     *   duration?: ?value-of<CreatePostsResponsePlatformConfigurationArticlePollDuration>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->question = $values['question'];
        $this->options = $values['options'];
        $this->duration = $values['duration'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
