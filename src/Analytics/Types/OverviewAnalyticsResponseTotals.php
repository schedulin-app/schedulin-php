<?php

namespace Schedulin\Analytics\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class OverviewAnalyticsResponseTotals extends JsonSerializableType
{
    /**
     * @var int $impressions
     */
    #[JsonProperty('impressions')]
    public int $impressions;

    /**
     * @var int $reach
     */
    #[JsonProperty('reach')]
    public int $reach;

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
     * @var int $saves
     */
    #[JsonProperty('saves')]
    public int $saves;

    /**
     * @var int $videoViews
     */
    #[JsonProperty('videoViews')]
    public int $videoViews;

    /**
     * @var int $clicks
     */
    #[JsonProperty('clicks')]
    public int $clicks;

    /**
     * @var int $linkClicks
     */
    #[JsonProperty('linkClicks')]
    public int $linkClicks;

    /**
     * @var int $engagement
     */
    #[JsonProperty('engagement')]
    public int $engagement;

    /**
     * @var int $audience Sum of the latest follower count of each account at `to`
     */
    #[JsonProperty('audience')]
    public int $audience;

    /**
     * @var int $postsPublished
     */
    #[JsonProperty('postsPublished')]
    public int $postsPublished;

    /**
     * @param array{
     *   impressions: int,
     *   reach: int,
     *   likes: int,
     *   comments: int,
     *   shares: int,
     *   saves: int,
     *   videoViews: int,
     *   clicks: int,
     *   linkClicks: int,
     *   engagement: int,
     *   audience: int,
     *   postsPublished: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->impressions = $values['impressions'];
        $this->reach = $values['reach'];
        $this->likes = $values['likes'];
        $this->comments = $values['comments'];
        $this->shares = $values['shares'];
        $this->saves = $values['saves'];
        $this->videoViews = $values['videoViews'];
        $this->clicks = $values['clicks'];
        $this->linkClicks = $values['linkClicks'];
        $this->engagement = $values['engagement'];
        $this->audience = $values['audience'];
        $this->postsPublished = $values['postsPublished'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
