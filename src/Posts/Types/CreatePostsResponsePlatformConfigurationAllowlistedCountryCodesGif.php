<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesGif extends JsonSerializableType
{
    /**
     * @var string $gifId
     */
    #[JsonProperty('gif_id')]
    public string $gifId;

    /**
     * @var ?value-of<CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesGifGifProvider> $gifProvider
     */
    #[JsonProperty('gif_provider')]
    public ?string $gifProvider;

    /**
     * @param array{
     *   gifId: string,
     *   gifProvider?: ?value-of<CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesGifGifProvider>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->gifId = $values['gifId'];
        $this->gifProvider = $values['gifProvider'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
