<?php

namespace Schedulin\Media\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Media\Types\CreateFromUrlMediaRequestFitToPlatformsItem;
use Schedulin\Core\Types\ArrayType;

class CreateFromUrlMediaRequest extends JsonSerializableType
{
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
     * @var ?string $alt
     */
    #[JsonProperty('alt')]
    public ?string $alt;

    /**
     * @var ?string $contentType
     */
    #[JsonProperty('contentType')]
    public ?string $contentType;

    /**
     * @var ?array<value-of<CreateFromUrlMediaRequestFitToPlatformsItem>> $fitToPlatforms Opt-in. Platforms the image will be posted to (e.g. ["instagram", "tiktok"]). The image is scaled down and/or re-encoded to fit the strictest of their size, dimension and format limits before it is stored. The original bytes are kept when the image already fits, or when none of the listed platforms has known image limits, so this is not a guaranteed conversion. Images only: videos and animated GIFs are stored as-is. Images over 50 MB or 100 megapixels are rejected when a listed platform has known image limits; import them without fitToPlatforms or shrink them first. Omit to store the file unchanged.
     */
    #[JsonProperty('fitToPlatforms'), ArrayType(['string'])]
    public ?array $fitToPlatforms;

    /**
     * @param array{
     *   url: string,
     *   name?: ?string,
     *   alt?: ?string,
     *   contentType?: ?string,
     *   fitToPlatforms?: ?array<value-of<CreateFromUrlMediaRequestFitToPlatformsItem>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
        $this->name = $values['name'] ?? null;
        $this->alt = $values['alt'] ?? null;
        $this->contentType = $values['contentType'] ?? null;
        $this->fitToPlatforms = $values['fitToPlatforms'] ?? null;
    }
}
