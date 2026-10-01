<?php

namespace Schedulin\Media\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

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
     * @param array{
     *   url: string,
     *   name?: ?string,
     *   alt?: ?string,
     *   contentType?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
        $this->name = $values['name'] ?? null;
        $this->alt = $values['alt'] ?? null;
        $this->contentType = $values['contentType'] ?? null;
    }
}
