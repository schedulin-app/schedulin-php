<?php

namespace Schedulin\SocialAccounts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class ReplaceQueueScheduleSocialAccountsResponseTimesItem extends JsonSerializableType
{
    /**
     * @var int $weekday Day of week in the account's timezone, 0 = Sunday … 6 = Saturday
     */
    #[JsonProperty('weekday')]
    public int $weekday;

    /**
     * @var string $time Wall-clock time in the account's timezone, 24h HH:MM
     */
    #[JsonProperty('time')]
    public string $time;

    /**
     * @var ?int $capacity How many posts this slot can hold (1-10, default 1)
     */
    #[JsonProperty('capacity')]
    public ?int $capacity;

    /**
     * @var ?string $label
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @param array{
     *   weekday: int,
     *   time: string,
     *   capacity?: ?int,
     *   label?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->weekday = $values['weekday'];
        $this->time = $values['time'];
        $this->capacity = $values['capacity'] ?? null;
        $this->label = $values['label'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
