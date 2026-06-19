<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;
use Schedulin\Types\SocialPlatform;

class AnalyticsSeriesPostsResponseDataItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $collectedAt
     */
    #[JsonProperty('collectedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $collectedAt;

    /**
     * @var value-of<SocialPlatform> $platform
     */
    #[JsonProperty('platform')]
    public string $platform;

    /**
     * @var mixed $metrics
     */
    #[JsonProperty('metrics')]
    public mixed $metrics;

    /**
     * @param array{
     *   id: string,
     *   collectedAt: DateTime,
     *   platform: value-of<SocialPlatform>,
     *   metrics?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->collectedAt = $values['collectedAt'];
        $this->platform = $values['platform'];
        $this->metrics = $values['metrics'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
