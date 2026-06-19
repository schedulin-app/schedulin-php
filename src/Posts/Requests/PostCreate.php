<?php

namespace Schedulin\Posts\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;
use Schedulin\Posts\Types\PostCreateMediaItem;
use Schedulin\Core\Types\ArrayType;
use Schedulin\Posts\Types\PostCreateThumbnail;
use Schedulin\Posts\Types\PostCreateAction;
use Schedulin\Posts\Types\PostCreatePartsItem;

class PostCreate extends JsonSerializableType
{
    /**
     * @var string $caption
     */
    #[JsonProperty('caption')]
    public string $caption;

    /**
     * @var ?DateTime $scheduledAt
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @var string $socialAccountId
     */
    #[JsonProperty('socialAccountId')]
    public string $socialAccountId;

    /**
     * @var ?array<PostCreateMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([PostCreateMediaItem::class])]
    public ?array $media;

    /**
     * @var ?PostCreateThumbnail $thumbnail
     */
    #[JsonProperty('thumbnail')]
    public ?PostCreateThumbnail $thumbnail;

    /**
     * @var ?array<string, mixed> $platformConfiguration
     */
    #[JsonProperty('platformConfiguration'), ArrayType(['string' => 'mixed'])]
    public ?array $platformConfiguration;

    /**
     * @var ?array<string> $tagIds
     */
    #[JsonProperty('tagIds'), ArrayType(['string'])]
    public ?array $tagIds;

    /**
     * @var ?value-of<PostCreateAction> $action
     */
    #[JsonProperty('action')]
    public ?string $action;

    /**
     * @var ?array<PostCreatePartsItem> $parts
     */
    #[JsonProperty('parts'), ArrayType([PostCreatePartsItem::class])]
    public ?array $parts;

    /**
     * @param array{
     *   caption: string,
     *   socialAccountId: string,
     *   scheduledAt?: ?DateTime,
     *   media?: ?array<PostCreateMediaItem>,
     *   thumbnail?: ?PostCreateThumbnail,
     *   platformConfiguration?: ?array<string, mixed>,
     *   tagIds?: ?array<string>,
     *   action?: ?value-of<PostCreateAction>,
     *   parts?: ?array<PostCreatePartsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->caption = $values['caption'];
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->socialAccountId = $values['socialAccountId'];
        $this->media = $values['media'] ?? null;
        $this->thumbnail = $values['thumbnail'] ?? null;
        $this->platformConfiguration = $values['platformConfiguration'] ?? null;
        $this->tagIds = $values['tagIds'] ?? null;
        $this->action = $values['action'] ?? null;
        $this->parts = $values['parts'] ?? null;
    }
}
