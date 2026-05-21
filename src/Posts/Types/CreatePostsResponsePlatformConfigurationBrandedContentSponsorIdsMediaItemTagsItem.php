<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class CreatePostsResponsePlatformConfigurationBrandedContentSponsorIdsMediaItemTagsItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<CreatePostsResponsePlatformConfigurationBrandedContentSponsorIdsMediaItemTagsItemType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<CreatePostsResponsePlatformConfigurationBrandedContentSponsorIdsMediaItemTagsItemPlatform> $platform
     */
    #[JsonProperty('platform')]
    public string $platform;

    /**
     * @var ?float $x
     */
    #[JsonProperty('x')]
    public ?float $x;

    /**
     * @var ?float $y
     */
    #[JsonProperty('y')]
    public ?float $y;

    /**
     * @param array{
     *   id: string,
     *   type: value-of<CreatePostsResponsePlatformConfigurationBrandedContentSponsorIdsMediaItemTagsItemType>,
     *   platform: value-of<CreatePostsResponsePlatformConfigurationBrandedContentSponsorIdsMediaItemTagsItemPlatform>,
     *   x?: ?float,
     *   y?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->type = $values['type'];
        $this->platform = $values['platform'];
        $this->x = $values['x'] ?? null;
        $this->y = $values['y'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
