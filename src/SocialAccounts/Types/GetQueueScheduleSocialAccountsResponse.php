<?php

namespace Schedulin\SocialAccounts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class GetQueueScheduleSocialAccountsResponse extends JsonSerializableType
{
    /**
     * @var string $timezone
     */
    #[JsonProperty('timezone')]
    public string $timezone;

    /**
     * @var array<GetQueueScheduleSocialAccountsResponseTimesItem> $times
     */
    #[JsonProperty('times'), ArrayType([GetQueueScheduleSocialAccountsResponseTimesItem::class])]
    public array $times;

    /**
     * @param array{
     *   timezone: string,
     *   times: array<GetQueueScheduleSocialAccountsResponseTimesItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->timezone = $values['timezone'];
        $this->times = $values['times'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
