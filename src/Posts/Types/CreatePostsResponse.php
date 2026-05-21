<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Types\PostStatus;
use DateTime;
use Schedulin\Core\Types\Date;
use Schedulin\Core\Types\Union;
use Schedulin\Core\Types\ArrayType;
use Schedulin\Types\SocialAccountPublic;

class CreatePostsResponse extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $externalId
     */
    #[JsonProperty('external_id')]
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
     * @var ?DateTime $scheduledAt
     */
    #[JsonProperty('scheduled_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @var (
     *    mixed
     *   |CreatePostsResponsePlatformConfigurationBrandedContentSponsorIds
     *   |CreatePostsResponsePlatformConfigurationAllowComment
     *   |CreatePostsResponsePlatformConfigurationCommunityId
     *   |CreatePostsResponsePlatformConfigurationAllowEmbedding
     *   |CreatePostsResponsePlatformConfigurationFeedTargeting
     *   |CreatePostsResponsePlatformConfigurationArticle
     *   |CreatePostsResponsePlatformConfigurationExternal
     *   |CreatePostsResponsePlatformConfigurationAllowlistedCountryCodes
     * )|null $platformConfiguration
     */
    #[JsonProperty('platform_configuration'), Union('mixed', CreatePostsResponsePlatformConfigurationBrandedContentSponsorIds::class, CreatePostsResponsePlatformConfigurationAllowComment::class, CreatePostsResponsePlatformConfigurationCommunityId::class, CreatePostsResponsePlatformConfigurationAllowEmbedding::class, CreatePostsResponsePlatformConfigurationFeedTargeting::class, CreatePostsResponsePlatformConfigurationArticle::class, CreatePostsResponsePlatformConfigurationExternal::class, CreatePostsResponsePlatformConfigurationAllowlistedCountryCodes::class, 'null')]
    public mixed|null $platformConfiguration;

    /**
     * @var array<CreatePostsResponseMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([CreatePostsResponseMediaItem::class])]
    public array $media;

    /**
     * @var array<SocialAccountPublic> $socialAccounts
     */
    #[JsonProperty('social_accounts'), ArrayType([SocialAccountPublic::class])]
    public array $socialAccounts;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   caption: string,
     *   status: value-of<PostStatus>,
     *   media: array<CreatePostsResponseMediaItem>,
     *   socialAccounts: array<SocialAccountPublic>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   externalId?: ?string,
     *   scheduledAt?: ?DateTime,
     *   platformConfiguration?: (
     *    mixed
     *   |CreatePostsResponsePlatformConfigurationBrandedContentSponsorIds
     *   |CreatePostsResponsePlatformConfigurationAllowComment
     *   |CreatePostsResponsePlatformConfigurationCommunityId
     *   |CreatePostsResponsePlatformConfigurationAllowEmbedding
     *   |CreatePostsResponsePlatformConfigurationFeedTargeting
     *   |CreatePostsResponsePlatformConfigurationArticle
     *   |CreatePostsResponsePlatformConfigurationExternal
     *   |CreatePostsResponsePlatformConfigurationAllowlistedCountryCodes
     * )|null,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->externalId = $values['externalId'] ?? null;
        $this->caption = $values['caption'];
        $this->status = $values['status'];
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->platformConfiguration = $values['platformConfiguration'] ?? null;
        $this->media = $values['media'];
        $this->socialAccounts = $values['socialAccounts'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
