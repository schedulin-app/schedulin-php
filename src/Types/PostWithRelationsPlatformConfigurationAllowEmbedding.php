<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class PostWithRelationsPlatformConfigurationAllowEmbedding extends JsonSerializableType
{
    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @var ?array<PostWithRelationsPlatformConfigurationAllowEmbeddingMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([PostWithRelationsPlatformConfigurationAllowEmbeddingMediaItem::class])]
    public ?array $media;

    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var string $categoryId
     */
    #[JsonProperty('categoryId')]
    public string $categoryId;

    /**
     * @var value-of<PostWithRelationsPlatformConfigurationAllowEmbeddingVisibility> $visibility
     */
    #[JsonProperty('visibility')]
    public string $visibility;

    /**
     * @var ?value-of<PostWithRelationsPlatformConfigurationAllowEmbeddingLicense> $license
     */
    #[JsonProperty('license')]
    public ?string $license;

    /**
     * @var ?bool $notifySubscribers
     */
    #[JsonProperty('notifySubscribers')]
    public ?bool $notifySubscribers;

    /**
     * @var ?bool $allowEmbedding
     */
    #[JsonProperty('allowEmbedding')]
    public ?bool $allowEmbedding;

    /**
     * @var ?bool $madeForKids
     */
    #[JsonProperty('madeForKids')]
    public ?bool $madeForKids;

    /**
     * @var ?array<string> $tags
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public ?array $tags;

    /**
     * @var ?string $defaultLanguage
     */
    #[JsonProperty('defaultLanguage')]
    public ?string $defaultLanguage;

    /**
     * @var ?string $defaultAudioLanguage
     */
    #[JsonProperty('defaultAudioLanguage')]
    public ?string $defaultAudioLanguage;

    /**
     * @var ?string $recordingDate
     */
    #[JsonProperty('recordingDate')]
    public ?string $recordingDate;

    /**
     * @var ?string $publishAt
     */
    #[JsonProperty('publishAt')]
    public ?string $publishAt;

    /**
     * @var ?bool $containsSyntheticMedia
     */
    #[JsonProperty('containsSyntheticMedia')]
    public ?bool $containsSyntheticMedia;

    /**
     * @var ?bool $publicStatsViewable
     */
    #[JsonProperty('publicStatsViewable')]
    public ?bool $publicStatsViewable;

    /**
     * @param array{
     *   title: string,
     *   categoryId: string,
     *   visibility: value-of<PostWithRelationsPlatformConfigurationAllowEmbeddingVisibility>,
     *   caption?: ?string,
     *   media?: ?array<PostWithRelationsPlatformConfigurationAllowEmbeddingMediaItem>,
     *   license?: ?value-of<PostWithRelationsPlatformConfigurationAllowEmbeddingLicense>,
     *   notifySubscribers?: ?bool,
     *   allowEmbedding?: ?bool,
     *   madeForKids?: ?bool,
     *   tags?: ?array<string>,
     *   defaultLanguage?: ?string,
     *   defaultAudioLanguage?: ?string,
     *   recordingDate?: ?string,
     *   publishAt?: ?string,
     *   containsSyntheticMedia?: ?bool,
     *   publicStatsViewable?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->caption = $values['caption'] ?? null;
        $this->media = $values['media'] ?? null;
        $this->title = $values['title'];
        $this->categoryId = $values['categoryId'];
        $this->visibility = $values['visibility'];
        $this->license = $values['license'] ?? null;
        $this->notifySubscribers = $values['notifySubscribers'] ?? null;
        $this->allowEmbedding = $values['allowEmbedding'] ?? null;
        $this->madeForKids = $values['madeForKids'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->defaultLanguage = $values['defaultLanguage'] ?? null;
        $this->defaultAudioLanguage = $values['defaultAudioLanguage'] ?? null;
        $this->recordingDate = $values['recordingDate'] ?? null;
        $this->publishAt = $values['publishAt'] ?? null;
        $this->containsSyntheticMedia = $values['containsSyntheticMedia'] ?? null;
        $this->publicStatsViewable = $values['publicStatsViewable'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
