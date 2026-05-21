<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class PostCreateThumbnail extends JsonSerializableType
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
     * @var ?array<PostCreateThumbnailTagsItem> $tags
     */
    #[JsonProperty('tags'), ArrayType([PostCreateThumbnailTagsItem::class])]
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
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $mimeType
     */
    #[JsonProperty('mimeType')]
    public ?string $mimeType;

    /**
     * @var ?float $width
     */
    #[JsonProperty('width')]
    public ?float $width;

    /**
     * @var ?float $height
     */
    #[JsonProperty('height')]
    public ?float $height;

    /**
     * @var ?float $size
     */
    #[JsonProperty('size')]
    public ?float $size;

    /**
     * @var ?float $duration
     */
    #[JsonProperty('duration')]
    public ?float $duration;

    /**
     * @param array{
     *   url: string,
     *   thumbnailUrl?: ?string,
     *   thumbnailTimestampMs?: ?float,
     *   tags?: ?array<PostCreateThumbnailTagsItem>,
     *   alt?: ?string,
     *   skipProcessing?: ?bool,
     *   name?: ?string,
     *   mimeType?: ?string,
     *   width?: ?float,
     *   height?: ?float,
     *   size?: ?float,
     *   duration?: ?float,
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
        $this->name = $values['name'] ?? null;
        $this->mimeType = $values['mimeType'] ?? null;
        $this->width = $values['width'] ?? null;
        $this->height = $values['height'] ?? null;
        $this->size = $values['size'] ?? null;
        $this->duration = $values['duration'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
