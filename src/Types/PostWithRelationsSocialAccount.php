<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class PostWithRelationsSocialAccount extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<SocialPlatform> $platform
     */
    #[JsonProperty('platform')]
    public string $platform;

    /**
     * @var ?string $username
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @param array{
     *   id: string,
     *   platform: value-of<SocialPlatform>,
     *   username?: ?string,
     *   imageUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->platform = $values['platform'];
        $this->username = $values['username'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
