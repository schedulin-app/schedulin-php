<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class PostWithRelationsPlatformConfigurationFeedTargeting extends JsonSerializableType
{
    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @var ?array<PostWithRelationsPlatformConfigurationFeedTargetingMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([PostWithRelationsPlatformConfigurationFeedTargetingMediaItem::class])]
    public ?array $media;

    /**
     * @var ?value-of<PostWithRelationsPlatformConfigurationFeedTargetingPlacement> $placement
     */
    #[JsonProperty('placement')]
    public ?string $placement;

    /**
     * @var ?string $location
     */
    #[JsonProperty('location')]
    public ?string $location;

    /**
     * @var ?array<string> $collaborators
     */
    #[JsonProperty('collaborators'), ArrayType(['string'])]
    public ?array $collaborators;

    /**
     * @var ?string $firstComment
     */
    #[JsonProperty('first_comment')]
    public ?string $firstComment;

    /**
     * @var ?array<string> $taggedUsers
     */
    #[JsonProperty('tagged_users'), ArrayType(['string'])]
    public ?array $taggedUsers;

    /**
     * @var ?int $scheduledPublishTime
     */
    #[JsonProperty('scheduled_publish_time')]
    public ?int $scheduledPublishTime;

    /**
     * @var ?array<string, mixed> $feedTargeting
     */
    #[JsonProperty('feed_targeting'), ArrayType(['string' => 'mixed'])]
    public ?array $feedTargeting;

    /**
     * @var ?array<string, mixed> $targeting
     */
    #[JsonProperty('targeting'), ArrayType(['string' => 'mixed'])]
    public ?array $targeting;

    /**
     * @param array{
     *   caption?: ?string,
     *   media?: ?array<PostWithRelationsPlatformConfigurationFeedTargetingMediaItem>,
     *   placement?: ?value-of<PostWithRelationsPlatformConfigurationFeedTargetingPlacement>,
     *   location?: ?string,
     *   collaborators?: ?array<string>,
     *   firstComment?: ?string,
     *   taggedUsers?: ?array<string>,
     *   scheduledPublishTime?: ?int,
     *   feedTargeting?: ?array<string, mixed>,
     *   targeting?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->caption = $values['caption'] ?? null;
        $this->media = $values['media'] ?? null;
        $this->placement = $values['placement'] ?? null;
        $this->location = $values['location'] ?? null;
        $this->collaborators = $values['collaborators'] ?? null;
        $this->firstComment = $values['firstComment'] ?? null;
        $this->taggedUsers = $values['taggedUsers'] ?? null;
        $this->scheduledPublishTime = $values['scheduledPublishTime'] ?? null;
        $this->feedTargeting = $values['feedTargeting'] ?? null;
        $this->targeting = $values['targeting'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
