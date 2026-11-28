<?php

namespace Schedulin\Posts\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;
use Schedulin\Posts\Types\UpdatePostsRequestMediaItem;
use Schedulin\Core\Types\ArrayType;
use Schedulin\Posts\Types\UpdatePostsRequestThumbnail;
use Schedulin\Posts\Types\UpdatePostsRequestStatus;
use Schedulin\Posts\Types\UpdatePostsRequestPartsItem;

class UpdatePostsRequest extends JsonSerializableType
{
    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?DateTime $scheduledAt
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @var ?array<UpdatePostsRequestMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([UpdatePostsRequestMediaItem::class])]
    public ?array $media;

    /**
     * @var ?UpdatePostsRequestThumbnail $thumbnail Cover image for the post's first video (used when that video has no `media[].thumbnail_url`), as a library `{ id }` or an image URL (public URLs are imported). `null` removes it; leave it out to keep it. Honoured by YouTube (custom thumbnail) and Instagram (Reel cover). TikTok can't take a custom cover image through its API; use `media[].thumbnail_timestamp_ms` there.
     */
    #[JsonProperty('thumbnail')]
    public ?UpdatePostsRequestThumbnail $thumbnail;

    /**
     * @var ?array<string, mixed> $platformConfiguration
     */
    #[JsonProperty('platformConfiguration'), ArrayType(['string' => 'mixed'])]
    public ?array $platformConfiguration;

    /**
     * @var ?value-of<UpdatePostsRequestStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<string> $tagIds
     */
    #[JsonProperty('tagIds'), ArrayType(['string'])]
    public ?array $tagIds;

    /**
     * @var ?array<UpdatePostsRequestPartsItem> $parts
     */
    #[JsonProperty('parts'), ArrayType([UpdatePostsRequestPartsItem::class])]
    public ?array $parts;

    /**
     * @param array{
     *   caption?: ?string,
     *   title?: ?string,
     *   scheduledAt?: ?DateTime,
     *   media?: ?array<UpdatePostsRequestMediaItem>,
     *   thumbnail?: ?UpdatePostsRequestThumbnail,
     *   platformConfiguration?: ?array<string, mixed>,
     *   status?: ?value-of<UpdatePostsRequestStatus>,
     *   tagIds?: ?array<string>,
     *   parts?: ?array<UpdatePostsRequestPartsItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->caption = $values['caption'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->media = $values['media'] ?? null;
        $this->thumbnail = $values['thumbnail'] ?? null;
        $this->platformConfiguration = $values['platformConfiguration'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tagIds = $values['tagIds'] ?? null;
        $this->parts = $values['parts'] ?? null;
    }
}
