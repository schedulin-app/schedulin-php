<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class UpdatePostsRequestPartsItem extends JsonSerializableType
{
    /**
     * @var string $caption
     */
    #[JsonProperty('caption')]
    public string $caption;

    /**
     * @var ?array<UpdatePostsRequestPartsItemMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([UpdatePostsRequestPartsItemMediaItem::class])]
    public ?array $media;

    /**
     * @param array{
     *   caption: string,
     *   media?: ?array<UpdatePostsRequestPartsItemMediaItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->caption = $values['caption'];
        $this->media = $values['media'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
