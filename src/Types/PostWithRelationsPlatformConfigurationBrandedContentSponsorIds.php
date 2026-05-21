<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class PostWithRelationsPlatformConfigurationBrandedContentSponsorIds extends JsonSerializableType
{
    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @var ?array<PostWithRelationsPlatformConfigurationBrandedContentSponsorIdsMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([PostWithRelationsPlatformConfigurationBrandedContentSponsorIdsMediaItem::class])]
    public ?array $media;

    /**
     * @var ?value-of<PostWithRelationsPlatformConfigurationBrandedContentSponsorIdsPlacement> $placement
     */
    #[JsonProperty('placement')]
    public ?string $placement;

    /**
     * @var ?array<string> $collaborators
     */
    #[JsonProperty('collaborators'), ArrayType(['string'])]
    public ?array $collaborators;

    /**
     * @var ?bool $shareToFeed
     */
    #[JsonProperty('share_to_feed')]
    public ?bool $shareToFeed;

    /**
     * @var ?string $location
     */
    #[JsonProperty('location')]
    public ?string $location;

    /**
     * @var ?value-of<PostWithRelationsPlatformConfigurationBrandedContentSponsorIdsTrialReelType> $trialReelType
     */
    #[JsonProperty('trial_reel_type')]
    public ?string $trialReelType;

    /**
     * @var ?string $music
     */
    #[JsonProperty('music')]
    public ?string $music;

    /**
     * @var ?string $taggedProducts
     */
    #[JsonProperty('tagged_products')]
    public ?string $taggedProducts;

    /**
     * @var ?string $firstComment
     */
    #[JsonProperty('first_comment')]
    public ?string $firstComment;

    /**
     * @var ?bool $notifyMe
     */
    #[JsonProperty('notify_me')]
    public ?bool $notifyMe;

    /**
     * @var ?bool $isPaidPartnership
     */
    #[JsonProperty('is_paid_partnership')]
    public ?bool $isPaidPartnership;

    /**
     * @var ?array<string> $brandedContentSponsorIds
     */
    #[JsonProperty('branded_content_sponsor_ids'), ArrayType(['string'])]
    public ?array $brandedContentSponsorIds;

    /**
     * @param array{
     *   caption?: ?string,
     *   media?: ?array<PostWithRelationsPlatformConfigurationBrandedContentSponsorIdsMediaItem>,
     *   placement?: ?value-of<PostWithRelationsPlatformConfigurationBrandedContentSponsorIdsPlacement>,
     *   collaborators?: ?array<string>,
     *   shareToFeed?: ?bool,
     *   location?: ?string,
     *   trialReelType?: ?value-of<PostWithRelationsPlatformConfigurationBrandedContentSponsorIdsTrialReelType>,
     *   music?: ?string,
     *   taggedProducts?: ?string,
     *   firstComment?: ?string,
     *   notifyMe?: ?bool,
     *   isPaidPartnership?: ?bool,
     *   brandedContentSponsorIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->caption = $values['caption'] ?? null;
        $this->media = $values['media'] ?? null;
        $this->placement = $values['placement'] ?? null;
        $this->collaborators = $values['collaborators'] ?? null;
        $this->shareToFeed = $values['shareToFeed'] ?? null;
        $this->location = $values['location'] ?? null;
        $this->trialReelType = $values['trialReelType'] ?? null;
        $this->music = $values['music'] ?? null;
        $this->taggedProducts = $values['taggedProducts'] ?? null;
        $this->firstComment = $values['firstComment'] ?? null;
        $this->notifyMe = $values['notifyMe'] ?? null;
        $this->isPaidPartnership = $values['isPaidPartnership'] ?? null;
        $this->brandedContentSponsorIds = $values['brandedContentSponsorIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
