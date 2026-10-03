<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;
use DateTime;
use Schedulin\Core\Types\Date;

class PostMedia extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $mimeType
     */
    #[JsonProperty('mimeType')]
    public string $mimeType;

    /**
     * @var ?int $width
     */
    #[JsonProperty('width')]
    public ?int $width;

    /**
     * @var ?int $height
     */
    #[JsonProperty('height')]
    public ?int $height;

    /**
     * @var ?int $duration
     */
    #[JsonProperty('duration')]
    public ?int $duration;

    /**
     * @var ?int $size
     */
    #[JsonProperty('size')]
    public ?int $size;

    /**
     * @var ?string $alt
     */
    #[JsonProperty('alt')]
    public ?string $alt;

    /**
     * @var ?string $thumbnailUrl
     */
    #[JsonProperty('thumbnailUrl')]
    public ?string $thumbnailUrl;

    /**
     * @var ?array<PostMediaTagsItem> $tags
     */
    #[JsonProperty('tags'), ArrayType([PostMediaTagsItem::class])]
    public ?array $tags;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   url: string,
     *   name: string,
     *   mimeType: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   width?: ?int,
     *   height?: ?int,
     *   duration?: ?int,
     *   size?: ?int,
     *   alt?: ?string,
     *   thumbnailUrl?: ?string,
     *   tags?: ?array<PostMediaTagsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->url = $values['url'];
        $this->name = $values['name'];
        $this->mimeType = $values['mimeType'];
        $this->width = $values['width'] ?? null;
        $this->height = $values['height'] ?? null;
        $this->duration = $values['duration'] ?? null;
        $this->size = $values['size'] ?? null;
        $this->alt = $values['alt'] ?? null;
        $this->thumbnailUrl = $values['thumbnailUrl'] ?? null;
        $this->tags = $values['tags'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
