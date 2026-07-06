<?php

namespace Schedulin\Platforms\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListPlatformsResponseDataItem extends JsonSerializableType
{
    /**
     * @var string $platform
     */
    #[JsonProperty('platform')]
    public string $platform;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?bool $comingSoon
     */
    #[JsonProperty('comingSoon')]
    public ?bool $comingSoon;

    /**
     * @var ?float $captionMaxLength
     */
    #[JsonProperty('captionMaxLength')]
    public ?float $captionMaxLength;

    /**
     * @var ?ListPlatformsResponseDataItemMediaRules $mediaRules
     */
    #[JsonProperty('mediaRules')]
    public ?ListPlatformsResponseDataItemMediaRules $mediaRules;

    /**
     * @var ListPlatformsResponseDataItemPlatformConfiguration $platformConfiguration
     */
    #[JsonProperty('platformConfiguration')]
    public ListPlatformsResponseDataItemPlatformConfiguration $platformConfiguration;

    /**
     * @var ?array<ListPlatformsResponseDataItemHelperEndpointsItem> $helperEndpoints
     */
    #[JsonProperty('helperEndpoints'), ArrayType([ListPlatformsResponseDataItemHelperEndpointsItem::class])]
    public ?array $helperEndpoints;

    /**
     * @param array{
     *   platform: string,
     *   name: string,
     *   platformConfiguration: ListPlatformsResponseDataItemPlatformConfiguration,
     *   comingSoon?: ?bool,
     *   captionMaxLength?: ?float,
     *   mediaRules?: ?ListPlatformsResponseDataItemMediaRules,
     *   helperEndpoints?: ?array<ListPlatformsResponseDataItemHelperEndpointsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->platform = $values['platform'];
        $this->name = $values['name'];
        $this->comingSoon = $values['comingSoon'] ?? null;
        $this->captionMaxLength = $values['captionMaxLength'] ?? null;
        $this->mediaRules = $values['mediaRules'] ?? null;
        $this->platformConfiguration = $values['platformConfiguration'];
        $this->helperEndpoints = $values['helperEndpoints'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
