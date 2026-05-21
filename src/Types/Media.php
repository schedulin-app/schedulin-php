<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;

class Media extends JsonSerializableType
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
     * @var ?float $duration
     */
    #[JsonProperty('duration')]
    public ?float $duration;

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
     * @var string $userId
     */
    #[JsonProperty('userId')]
    public string $userId;

    /**
     * @var string $bucket
     */
    #[JsonProperty('bucket')]
    public string $bucket;

    /**
     * @var string $key
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var ?float $size
     */
    #[JsonProperty('size')]
    public ?float $size;

    /**
     * @param array{
     *   id: string,
     *   url: string,
     *   name: string,
     *   mimeType: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   userId: string,
     *   bucket: string,
     *   key: string,
     *   width?: ?float,
     *   height?: ?float,
     *   duration?: ?float,
     *   size?: ?float,
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
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->userId = $values['userId'];
        $this->bucket = $values['bucket'];
        $this->key = $values['key'];
        $this->size = $values['size'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
