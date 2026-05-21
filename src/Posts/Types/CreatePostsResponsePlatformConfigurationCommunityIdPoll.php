<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class CreatePostsResponsePlatformConfigurationCommunityIdPoll extends JsonSerializableType
{
    /**
     * @var float $durationMinutes
     */
    #[JsonProperty('duration_minutes')]
    public float $durationMinutes;

    /**
     * @var array<string> $options
     */
    #[JsonProperty('options'), ArrayType(['string'])]
    public array $options;

    /**
     * @var ?value-of<CreatePostsResponsePlatformConfigurationCommunityIdPollReplySettings> $replySettings
     */
    #[JsonProperty('reply_settings')]
    public ?string $replySettings;

    /**
     * @param array{
     *   durationMinutes: float,
     *   options: array<string>,
     *   replySettings?: ?value-of<CreatePostsResponsePlatformConfigurationCommunityIdPollReplySettings>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->durationMinutes = $values['durationMinutes'];
        $this->options = $values['options'];
        $this->replySettings = $values['replySettings'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
