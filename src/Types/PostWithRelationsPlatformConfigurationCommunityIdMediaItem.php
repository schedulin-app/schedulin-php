<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class PostWithRelationsPlatformConfigurationCommunityIdMediaItem extends JsonSerializableType
{
    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var ?string $thumbnailUrl
     */
    #[JsonProperty('thumbnail_url')]
    public ?string $thumbnailUrl;

    /**
     * @var ?float $thumbnailTimestampMs
     */
    #[JsonProperty('thumbnail_timestamp_ms')]
    public ?float $thumbnailTimestampMs;

    /**
     * @var ?array<PostWithRelationsPlatformConfigurationCommunityIdMediaItemTagsItem> $tags
     */
    #[JsonProperty('tags'), ArrayType([PostWithRelationsPlatformConfigurationCommunityIdMediaItemTagsItem::class])]
    public ?array $tags;

    /**
     * @var ?string $alt
     */
    #[JsonProperty('alt')]
    public ?string $alt;

    /**
     * @var ?bool $skipProcessing
     */
    #[JsonProperty('skip_processing')]
    public ?bool $skipProcessing;

    /**
     * @param array{
     *   url: string,
     *   thumbnailUrl?: ?string,
     *   thumbnailTimestampMs?: ?float,
     *   tags?: ?array<PostWithRelationsPlatformConfigurationCommunityIdMediaItemTagsItem>,
     *   alt?: ?string,
     *   skipProcessing?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
        $this->thumbnailUrl = $values['thumbnailUrl'] ?? null;
        $this->thumbnailTimestampMs = $values['thumbnailTimestampMs'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->alt = $values['alt'] ?? null;
        $this->skipProcessing = $values['skipProcessing'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
