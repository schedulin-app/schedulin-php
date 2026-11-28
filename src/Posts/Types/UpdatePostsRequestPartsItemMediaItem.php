<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class UpdatePostsRequestPartsItemMediaItem extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

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
     * @var ?string $alt
     */
    #[JsonProperty('alt')]
    public ?string $alt;

    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @var ?array<UpdatePostsRequestPartsItemMediaItemTagsItem> $tags
     */
    #[JsonProperty('tags'), ArrayType([UpdatePostsRequestPartsItemMediaItemTagsItem::class])]
    public ?array $tags;

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
     * @var ?bool $skipProcessing Publish this file exactly as uploaded: no conversion, remux or re-encode before publishing. Use only for files you know the platform accepts (e.g. a web-ready H.264/AAC MP4 or a JPEG/PNG); an unsupported format will be rejected by the platform at publish.
     */
    #[JsonProperty('skip_processing')]
    public ?bool $skipProcessing;

    /**
     * @var ?string $bucket
     */
    #[JsonProperty('bucket')]
    public ?string $bucket;

    /**
     * @var ?string $key
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @param array{
     *   id?: ?string,
     *   url?: ?string,
     *   name?: ?string,
     *   mimeType?: ?string,
     *   width?: ?float,
     *   height?: ?float,
     *   size?: ?float,
     *   duration?: ?float,
     *   alt?: ?string,
     *   caption?: ?string,
     *   tags?: ?array<UpdatePostsRequestPartsItemMediaItemTagsItem>,
     *   thumbnailUrl?: ?string,
     *   thumbnailTimestampMs?: ?float,
     *   skipProcessing?: ?bool,
     *   bucket?: ?string,
     *   key?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->mimeType = $values['mimeType'] ?? null;
        $this->width = $values['width'] ?? null;
        $this->height = $values['height'] ?? null;
        $this->size = $values['size'] ?? null;
        $this->duration = $values['duration'] ?? null;
        $this->alt = $values['alt'] ?? null;
        $this->caption = $values['caption'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->thumbnailUrl = $values['thumbnailUrl'] ?? null;
        $this->thumbnailTimestampMs = $values['thumbnailTimestampMs'] ?? null;
        $this->skipProcessing = $values['skipProcessing'] ?? null;
        $this->bucket = $values['bucket'] ?? null;
        $this->key = $values['key'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
