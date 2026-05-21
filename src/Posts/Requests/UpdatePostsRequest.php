<?php

namespace Schedulin\Posts\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;
use Schedulin\Posts\Types\UpdatePostsRequestMediaItem;
use Schedulin\Core\Types\ArrayType;
use Schedulin\Posts\Types\UpdatePostsRequestStatus;

class UpdatePostsRequest extends JsonSerializableType
{
    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

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
     * @param array{
     *   caption?: ?string,
     *   scheduledAt?: ?DateTime,
     *   media?: ?array<UpdatePostsRequestMediaItem>,
     *   platformConfiguration?: ?array<string, mixed>,
     *   status?: ?value-of<UpdatePostsRequestStatus>,
     *   tagIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->caption = $values['caption'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->media = $values['media'] ?? null;
        $this->platformConfiguration = $values['platformConfiguration'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->tagIds = $values['tagIds'] ?? null;
    }
}
