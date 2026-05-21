<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class CreatePostsResponsePlatformConfigurationAllowComment extends JsonSerializableType
{
    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @var ?array<CreatePostsResponsePlatformConfigurationAllowCommentMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([CreatePostsResponsePlatformConfigurationAllowCommentMediaItem::class])]
    public ?array $media;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?int $photoCoverIndex
     */
    #[JsonProperty('photo_cover_index')]
    public ?int $photoCoverIndex;

    /**
     * @var ?value-of<CreatePostsResponsePlatformConfigurationAllowCommentPrivacyStatus> $privacyStatus
     */
    #[JsonProperty('privacy_status')]
    public ?string $privacyStatus;

    /**
     * @var ?bool $allowComment
     */
    #[JsonProperty('allow_comment')]
    public ?bool $allowComment;

    /**
     * @var ?bool $allowDuet
     */
    #[JsonProperty('allow_duet')]
    public ?bool $allowDuet;

    /**
     * @var ?bool $allowStitch
     */
    #[JsonProperty('allow_stitch')]
    public ?bool $allowStitch;

    /**
     * @var ?bool $discloseYourBrand
     */
    #[JsonProperty('disclose_your_brand')]
    public ?bool $discloseYourBrand;

    /**
     * @var ?bool $discloseBrandedContent
     */
    #[JsonProperty('disclose_branded_content')]
    public ?bool $discloseBrandedContent;

    /**
     * @var ?bool $discloseVideoContent
     */
    #[JsonProperty('disclose_video_content')]
    public ?bool $discloseVideoContent;

    /**
     * @var ?bool $isAiGenerated
     */
    #[JsonProperty('is_ai_generated')]
    public ?bool $isAiGenerated;

    /**
     * @var ?bool $isDraft
     */
    #[JsonProperty('is_draft')]
    public ?bool $isDraft;

    /**
     * @var ?bool $autoAddMusic
     */
    #[JsonProperty('auto_add_music')]
    public ?bool $autoAddMusic;

    /**
     * @param array{
     *   caption?: ?string,
     *   media?: ?array<CreatePostsResponsePlatformConfigurationAllowCommentMediaItem>,
     *   title?: ?string,
     *   description?: ?string,
     *   photoCoverIndex?: ?int,
     *   privacyStatus?: ?value-of<CreatePostsResponsePlatformConfigurationAllowCommentPrivacyStatus>,
     *   allowComment?: ?bool,
     *   allowDuet?: ?bool,
     *   allowStitch?: ?bool,
     *   discloseYourBrand?: ?bool,
     *   discloseBrandedContent?: ?bool,
     *   discloseVideoContent?: ?bool,
     *   isAiGenerated?: ?bool,
     *   isDraft?: ?bool,
     *   autoAddMusic?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->caption = $values['caption'] ?? null;
        $this->media = $values['media'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->photoCoverIndex = $values['photoCoverIndex'] ?? null;
        $this->privacyStatus = $values['privacyStatus'] ?? null;
        $this->allowComment = $values['allowComment'] ?? null;
        $this->allowDuet = $values['allowDuet'] ?? null;
        $this->allowStitch = $values['allowStitch'] ?? null;
        $this->discloseYourBrand = $values['discloseYourBrand'] ?? null;
        $this->discloseBrandedContent = $values['discloseBrandedContent'] ?? null;
        $this->discloseVideoContent = $values['discloseVideoContent'] ?? null;
        $this->isAiGenerated = $values['isAiGenerated'] ?? null;
        $this->isDraft = $values['isDraft'] ?? null;
        $this->autoAddMusic = $values['autoAddMusic'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
