<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class PostWithRelationsPlatformConfigurationCommunityId extends JsonSerializableType
{
    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @var ?array<PostWithRelationsPlatformConfigurationCommunityIdMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([PostWithRelationsPlatformConfigurationCommunityIdMediaItem::class])]
    public ?array $media;

    /**
     * @var ?PostWithRelationsPlatformConfigurationCommunityIdPoll $poll
     */
    #[JsonProperty('poll')]
    public ?PostWithRelationsPlatformConfigurationCommunityIdPoll $poll;

    /**
     * @var ?string $communityId
     */
    #[JsonProperty('community_id')]
    public ?string $communityId;

    /**
     * @var ?string $communityName
     */
    #[JsonProperty('community_name')]
    public ?string $communityName;

    /**
     * @var ?string $quoteTweetId
     */
    #[JsonProperty('quote_tweet_id')]
    public ?string $quoteTweetId;

    /**
     * @var ?string $inReplyToTweetId
     */
    #[JsonProperty('in_reply_to_tweet_id')]
    public ?string $inReplyToTweetId;

    /**
     * @var ?PostWithRelationsPlatformConfigurationCommunityIdGeo $geo
     */
    #[JsonProperty('geo')]
    public ?PostWithRelationsPlatformConfigurationCommunityIdGeo $geo;

    /**
     * @var ?value-of<PostWithRelationsPlatformConfigurationCommunityIdReplySettings> $replySettings
     */
    #[JsonProperty('reply_settings')]
    public ?string $replySettings;

    /**
     * @param array{
     *   caption?: ?string,
     *   media?: ?array<PostWithRelationsPlatformConfigurationCommunityIdMediaItem>,
     *   poll?: ?PostWithRelationsPlatformConfigurationCommunityIdPoll,
     *   communityId?: ?string,
     *   communityName?: ?string,
     *   quoteTweetId?: ?string,
     *   inReplyToTweetId?: ?string,
     *   geo?: ?PostWithRelationsPlatformConfigurationCommunityIdGeo,
     *   replySettings?: ?value-of<PostWithRelationsPlatformConfigurationCommunityIdReplySettings>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->caption = $values['caption'] ?? null;
        $this->media = $values['media'] ?? null;
        $this->poll = $values['poll'] ?? null;
        $this->communityId = $values['communityId'] ?? null;
        $this->communityName = $values['communityName'] ?? null;
        $this->quoteTweetId = $values['quoteTweetId'] ?? null;
        $this->inReplyToTweetId = $values['inReplyToTweetId'] ?? null;
        $this->geo = $values['geo'] ?? null;
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
