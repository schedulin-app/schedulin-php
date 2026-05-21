<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class CreatePostsResponsePlatformConfigurationExternalExternal extends JsonSerializableType
{
    /**
     * @var string $uri
     */
    #[JsonProperty('uri')]
    public string $uri;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $thumbUrl
     */
    #[JsonProperty('thumb_url')]
    public ?string $thumbUrl;

    /**
     * @param array{
     *   uri: string,
     *   title?: ?string,
     *   description?: ?string,
     *   thumbUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uri = $values['uri'];
        $this->title = $values['title'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->thumbUrl = $values['thumbUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
