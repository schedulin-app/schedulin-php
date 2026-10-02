<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

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
