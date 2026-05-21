<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class PostPlatformConfigurationAllowlistedCountryCodes extends JsonSerializableType
{
    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @var ?array<PostPlatformConfigurationAllowlistedCountryCodesMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([PostPlatformConfigurationAllowlistedCountryCodesMediaItem::class])]
    public ?array $media;

    /**
     * @var ?value-of<PostPlatformConfigurationAllowlistedCountryCodesPlacement> $placement
     */
    #[JsonProperty('placement')]
    public ?string $placement;

    /**
     * @var ?value-of<PostPlatformConfigurationAllowlistedCountryCodesPostType> $postType
     */
    #[JsonProperty('post_type')]
    public ?string $postType;

    /**
     * @var ?value-of<PostPlatformConfigurationAllowlistedCountryCodesReplyControl> $replyControl
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
     * @var ?PostPlatformConfigurationAllowlistedCountryCodesPoll $poll
     */
    #[JsonProperty('poll')]
    public ?PostPlatformConfigurationAllowlistedCountryCodesPoll $poll;

    /**
     * @var ?PostPlatformConfigurationAllowlistedCountryCodesGif $gif
     */
    #[JsonProperty('gif')]
    public ?PostPlatformConfigurationAllowlistedCountryCodesGif $gif;

    /**
     * @param array{
     *   caption?: ?string,
     *   media?: ?array<PostPlatformConfigurationAllowlistedCountryCodesMediaItem>,
     *   placement?: ?value-of<PostPlatformConfigurationAllowlistedCountryCodesPlacement>,
     *   postType?: ?value-of<PostPlatformConfigurationAllowlistedCountryCodesPostType>,
     *   replyControl?: ?value-of<PostPlatformConfigurationAllowlistedCountryCodesReplyControl>,
     *   topic?: ?string,
     *   topicTag?: ?string,
     *   location?: ?string,
     *   locationId?: ?string,
     *   quotePostId?: ?string,
     *   replyToId?: ?string,
     *   linkAttachment?: ?string,
     *   allowlistedCountryCodes?: ?array<string>,
     *   poll?: ?PostPlatformConfigurationAllowlistedCountryCodesPoll,
     *   gif?: ?PostPlatformConfigurationAllowlistedCountryCodesGif,
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
