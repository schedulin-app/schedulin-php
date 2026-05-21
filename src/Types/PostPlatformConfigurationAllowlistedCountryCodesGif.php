<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class PostPlatformConfigurationAllowlistedCountryCodesGif extends JsonSerializableType
{
    /**
     * @var string $gifId
     */
    #[JsonProperty('gif_id')]
    public string $gifId;

    /**
     * @var ?value-of<PostPlatformConfigurationAllowlistedCountryCodesGifGifProvider> $gifProvider
     */
    #[JsonProperty('gif_provider')]
    public ?string $gifProvider;

    /**
     * @param array{
     *   gifId: string,
     *   gifProvider?: ?value-of<PostPlatformConfigurationAllowlistedCountryCodesGifGifProvider>,
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
