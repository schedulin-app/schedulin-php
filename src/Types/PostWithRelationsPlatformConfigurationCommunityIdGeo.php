<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class PostWithRelationsPlatformConfigurationCommunityIdGeo extends JsonSerializableType
{
    /**
     * @var string $placeId
     */
    #[JsonProperty('place_id')]
    public string $placeId;

    /**
     * @param array{
     *   placeId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->placeId = $values['placeId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
