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
     * @var ?int $captionMaxLength
     */
    #[JsonProperty('captionMaxLength')]
    public ?int $captionMaxLength;

    /**
     * @var ?value-of<ListPlatformsResponseDataItemCaptionLengthUnit> $captionLengthUnit
     */
    #[JsonProperty('captionLengthUnit')]
    public ?string $captionLengthUnit;

    /**
     * @var ?int $captionMaxLengthWithMedia
     */
    #[JsonProperty('captionMaxLengthWithMedia')]
    public ?int $captionMaxLengthWithMedia;

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
     *   captionMaxLength?: ?int,
     *   captionLengthUnit?: ?value-of<ListPlatformsResponseDataItemCaptionLengthUnit>,
     *   captionMaxLengthWithMedia?: ?int,
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
        $this->captionLengthUnit = $values['captionLengthUnit'] ?? null;
        $this->captionMaxLengthWithMedia = $values['captionMaxLengthWithMedia'] ?? null;
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
