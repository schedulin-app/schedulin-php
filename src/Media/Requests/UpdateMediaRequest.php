<?php

namespace Schedulin\Media\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class UpdateMediaRequest extends JsonSerializableType
{
    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var ?string $mimeType
     */
    #[JsonProperty('mimeType')]
    public ?string $mimeType;

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
     * @var ?int $size
     */
    #[JsonProperty('size')]
    public ?int $size;

    /**
     * @var ?float $duration
     */
    #[JsonProperty('duration')]
    public ?float $duration;

    /**
     * @param array{
     *   url: string,
     *   mimeType?: ?string,
     *   width?: ?int,
     *   height?: ?int,
     *   size?: ?int,
     *   duration?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
        $this->mimeType = $values['mimeType'] ?? null;
        $this->width = $values['width'] ?? null;
        $this->height = $values['height'] ?? null;
        $this->size = $values['size'] ?? null;
        $this->duration = $values['duration'] ?? null;
    }
}
