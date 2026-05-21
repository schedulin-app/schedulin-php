<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class CreatePostsResponsePlatformConfigurationAllowlistedCountryCodes extends JsonSerializableType
{
    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @var ?array<CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesMediaItem::class])]
    public ?array $media;

    /**
     * @var ?value-of<CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesPlacement> $placement
     */
    #[JsonProperty('placement')]
    public ?string $placement;

    /**
     * @var ?value-of<CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesPostType> $postType
     */
    #[JsonProperty('post_type')]
    public ?string $postType;

    /**
     * @var ?value-of<CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesReplyControl> $replyControl
     */
    #[JsonProperty('reply_control')]
    public ?string $replyControl;

    /**
     * @var ?string $topic
     */
    #[JsonProperty('topic')]
    public ?string $topic;

    /**
     * @var ?string $topicTag
     */
    #[JsonProperty('topic_tag')]
    public ?string $topicTag;

    /**
     * @var ?string $location
     */
    #[JsonProperty('location')]
    public ?string $location;

    /**
     * @var ?string $locationId
     */
    #[JsonProperty('location_id')]
    public ?string $locationId;

    /**
     * @var ?string $quotePostId
     */
    #[JsonProperty('quote_post_id')]
    public ?string $quotePostId;

    /**
     * @var ?string $replyToId
     */
    #[JsonProperty('reply_to_id')]
    public ?string $replyToId;

    /**
     * @var ?string $linkAttachment
     */
    #[JsonProperty('link_attachment')]
    public ?string $linkAttachment;

    /**
     * @var ?array<string> $allowlistedCountryCodes
     */
    #[JsonProperty('allowlisted_country_codes'), ArrayType(['string'])]
    public ?array $allowlistedCountryCodes;

    /**
     * @var ?CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesPoll $poll
     */
    #[JsonProperty('poll')]
    public ?CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesPoll $poll;

    /**
     * @var ?CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesGif $gif
     */
    #[JsonProperty('gif')]
    public ?CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesGif $gif;

    /**
     * @param array{
     *   caption?: ?string,
     *   media?: ?array<CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesMediaItem>,
     *   placement?: ?value-of<CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesPlacement>,
     *   postType?: ?value-of<CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesPostType>,
     *   replyControl?: ?value-of<CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesReplyControl>,
     *   topic?: ?string,
     *   topicTag?: ?string,
     *   location?: ?string,
     *   locationId?: ?string,
     *   quotePostId?: ?string,
     *   replyToId?: ?string,
     *   linkAttachment?: ?string,
     *   allowlistedCountryCodes?: ?array<string>,
     *   poll?: ?CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesPoll,
     *   gif?: ?CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesGif,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->caption = $values['caption'] ?? null;
        $this->media = $values['media'] ?? null;
        $this->placement = $values['placement'] ?? null;
        $this->postType = $values['postType'] ?? null;
        $this->replyControl = $values['replyControl'] ?? null;
        $this->topic = $values['topic'] ?? null;
        $this->topicTag = $values['topicTag'] ?? null;
        $this->location = $values['location'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->quotePostId = $values['quotePostId'] ?? null;
        $this->replyToId = $values['replyToId'] ?? null;
        $this->linkAttachment = $values['linkAttachment'] ?? null;
        $this->allowlistedCountryCodes = $values['allowlistedCountryCodes'] ?? null;
        $this->poll = $values['poll'] ?? null;
        $this->gif = $values['gif'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
