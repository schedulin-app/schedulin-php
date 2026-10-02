<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class PostThreadPart extends JsonSerializableType
{
    /**
     * @var string $caption
     */
    #[JsonProperty('caption')]
    public string $caption;

    /**
     * @var array<PostMedia> $media
     */
    #[JsonProperty('media'), ArrayType([PostMedia::class])]
    public array $media;

    /**
     * @param array{
     *   caption: string,
     *   media: array<PostMedia>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->caption = $values['caption'];
        $this->media = $values['media'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
