<?php

namespace Schedulin\Media\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class UploadMediaRequest extends JsonSerializableType
{
    /**
     * @var string $file
     */
    #[JsonProperty('file')]
    public string $file;

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
     * @param array{
     *   file: string,
     *   name?: ?string,
     *   alt?: ?string,
     *   contentType?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->file = $values['file'];
        $this->name = $values['name'] ?? null;
        $this->alt = $values['alt'] ?? null;
        $this->contentType = $values['contentType'] ?? null;
    }
}
