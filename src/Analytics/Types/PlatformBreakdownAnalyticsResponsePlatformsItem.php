<?php

namespace Schedulin\Analytics\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class PlatformBreakdownAnalyticsResponsePlatformsItem extends JsonSerializableType
{
    /**
     * @var string $platform
     */
    #[JsonProperty('platform')]
    public string $platform;

    /**
     * @var int $impressions
     */
    #[JsonProperty('impressions')]
    public int $impressions;

    /**
     * @var int $likes
     */
    #[JsonProperty('likes')]
    public int $likes;

    /**
     * @var int $comments
     */
    #[JsonProperty('comments')]
    public int $comments;

    /**
     * @var int $shares
     */
    #[JsonProperty('shares')]
    public int $shares;

    /**
     * @var int $engagement
     */
    #[JsonProperty('engagement')]
    public int $engagement;

    /**
     * @param array{
     *   platform: string,
     *   impressions: int,
     *   likes: int,
     *   comments: int,
     *   shares: int,
     *   engagement: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->platform = $values['platform'];
        $this->impressions = $values['impressions'];
        $this->likes = $values['likes'];
        $this->comments = $values['comments'];
        $this->shares = $values['shares'];
        $this->engagement = $values['engagement'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
