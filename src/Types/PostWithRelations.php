<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;
use Schedulin\Core\Types\ArrayType;

class PostWithRelations extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $externalId
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var string $caption
     */
    #[JsonProperty('caption')]
    public string $caption;

    /**
     * @var value-of<PostStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var value-of<PostApprovalStatus> $approvalStatus
     */
    #[JsonProperty('approvalStatus')]
    public string $approvalStatus;

    /**
     * @var ?DateTime $approvalRequestedAt
     */
    #[JsonProperty('approvalRequestedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $approvalRequestedAt;

    /**
     * @var ?string $approvalRequestedBy
     */
    #[JsonProperty('approvalRequestedBy')]
    public ?string $approvalRequestedBy;

    /**
     * @var ?DateTime $approvedAt
     */
    #[JsonProperty('approvedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $approvedAt;

    /**
     * @var ?string $approvedBy
     */
    #[JsonProperty('approvedBy')]
    public ?string $approvedBy;

    /**
     * @var ?string $rejectionReason
     */
    #[JsonProperty('rejectionReason')]
    public ?string $rejectionReason;

    /**
     * @var ?DateTime $scheduledAt
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @var ?array<string, mixed> $platformConfiguration
     */
    #[JsonProperty('platformConfiguration'), ArrayType(['string' => 'mixed'])]
    public ?array $platformConfiguration;

    /**
     * @var string $socialAccountId
     */
    #[JsonProperty('socialAccountId')]
    public string $socialAccountId;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var SocialAccount $socialAccount
     */
    #[JsonProperty('socialAccount')]
    public SocialAccount $socialAccount;

    /**
     * @var array<PostWithRelationsMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([PostWithRelationsMediaItem::class])]
    public array $media;

    /**
     * @var array<Tag> $tags
     */
    #[JsonProperty('tags'), ArrayType([Tag::class])]
    public array $tags;

    /**
     * @param array{
     *   id: string,
     *   caption: string,
     *   status: value-of<PostStatus>,
     *   approvalStatus: value-of<PostApprovalStatus>,
     *   socialAccountId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   socialAccount: SocialAccount,
     *   media: array<PostWithRelationsMediaItem>,
     *   tags: array<Tag>,
     *   externalId?: ?string,
     *   approvalRequestedAt?: ?DateTime,
     *   approvalRequestedBy?: ?string,
     *   approvedAt?: ?DateTime,
     *   approvedBy?: ?string,
     *   rejectionReason?: ?string,
     *   scheduledAt?: ?DateTime,
     *   platformConfiguration?: ?array<string, mixed>,
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->externalId = $values['externalId'] ?? null;
        $this->caption = $values['caption'];
        $this->status = $values['status'];
        $this->approvalStatus = $values['approvalStatus'];
        $this->approvalRequestedAt = $values['approvalRequestedAt'] ?? null;
        $this->approvalRequestedBy = $values['approvalRequestedBy'] ?? null;
        $this->approvedAt = $values['approvedAt'] ?? null;
        $this->approvedBy = $values['approvedBy'] ?? null;
        $this->rejectionReason = $values['rejectionReason'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->platformConfiguration = $values['platformConfiguration'] ?? null;
        $this->socialAccountId = $values['socialAccountId'];
        $this->url = $values['url'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->socialAccount = $values['socialAccount'];
        $this->media = $values['media'];
        $this->tags = $values['tags'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
