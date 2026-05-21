<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class PostWithRelationsPlatformConfigurationArticleArticle extends JsonSerializableType
{
    /**
     * @var string $source
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $thumbnailUrl
     */
    #[JsonProperty('thumbnail_url')]
    public ?string $thumbnailUrl;

    /**
     * @param array{
     *   source: string,
     *   title: string,
     *   description?: ?string,
     *   thumbnailUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->source = $values['source'];
        $this->title = $values['title'];
        $this->description = $values['description'] ?? null;
        $this->thumbnailUrl = $values['thumbnailUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
