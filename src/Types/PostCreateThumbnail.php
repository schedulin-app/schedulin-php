<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

/**
 * Cover image for the post's first video (an image URL or stored library image), used when that video has no `media[].thumbnail_url`. Honoured by YouTube (custom thumbnail) and Instagram (Reel cover). TikTok can't take a cover image through its API (the post publishes with a warning); use `media[].thumbnail_timestamp_ms` to pick a frame instead.
 */
class PostCreateThumbnail extends JsonSerializableType
{
    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

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
     * @var ?bool $skipProcessing Publish this file exactly as uploaded: no conversion, remux or re-encode before publishing. Use only for files you know the platform accepts (e.g. a web-ready H.264/AAC MP4 or a JPEG/PNG); an unsupported format will be rejected by the platform at publish.
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
     * @var ?string $thumbnailUrl Custom cover image for this video: a public image URL (imported into your media library) or a stored library image URL. Used by Instagram (Reel cover, `cover_url`) and YouTube (custom thumbnail); wins over the post-level `thumbnail`. TikTok can't take a cover image through its API, so the post publishes with a warning; use `thumbnail_timestamp_ms` there. `null` clears it; leaving it out on update keeps it.
     */
    #[JsonProperty('thumbnail_url')]
    public ?string $thumbnailUrl;

    /**
     * @var ?float $thumbnailTimestampMs Which frame of this video to use as its cover, in milliseconds from the start. Used by TikTok (`video_cover_timestamp_ms`) and Instagram (`thumb_offset`, Reels and carousel videos; a cover image wins over it on a Reel). YouTube can't pick a frame through its API, so it's ignored there with a warning. `null` clears it; leaving it out on update keeps it.
     */
    #[JsonProperty('thumbnail_timestamp_ms')]
    public ?float $thumbnailTimestampMs;

    /**
     * @var ?string $caption This photo's own caption in this post. Facebook photo posts show it when the photo is opened; Pinterest carousel Pins show it on that slide (up to 800 characters); Reddit galleries show it under that image (up to 180). Other platforms ignore it.
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @param array{
     *   url: string,
     *   tags?: ?array<PostCreateThumbnailTagsItem>,
     *   alt?: ?string,
     *   skipProcessing?: ?bool,
     *   name?: ?string,
     *   mimeType?: ?string,
     *   width?: ?float,
     *   height?: ?float,
     *   size?: ?float,
     *   duration?: ?float,
     *   thumbnailUrl?: ?string,
     *   thumbnailTimestampMs?: ?float,
     *   caption?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
        $this->tags = $values['tags'] ?? null;
        $this->alt = $values['alt'] ?? null;
        $this->skipProcessing = $values['skipProcessing'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->mimeType = $values['mimeType'] ?? null;
        $this->width = $values['width'] ?? null;
        $this->height = $values['height'] ?? null;
        $this->size = $values['size'] ?? null;
        $this->duration = $values['duration'] ?? null;
        $this->thumbnailUrl = $values['thumbnailUrl'] ?? null;
        $this->thumbnailTimestampMs = $values['thumbnailTimestampMs'] ?? null;
        $this->caption = $values['caption'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
