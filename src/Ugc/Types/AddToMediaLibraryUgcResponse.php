<?php

namespace Schedulin\Ugc\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class AddToMediaLibraryUgcResponse extends JsonSerializableType
{
    /**
     * @var string $mediaId
     */
    #[JsonProperty('mediaId')]
    public string $mediaId;

    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

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
     * @param array{
     *   mediaId: string,
     *   url: string,
     *   name?: ?string,
     *   mimeType?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->mediaId = $values['mediaId'];
        $this->url = $values['url'];
        $this->name = $values['name'] ?? null;
        $this->mimeType = $values['mimeType'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
