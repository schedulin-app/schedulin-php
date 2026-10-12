<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;

class PostRetry extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?bool $force Confirm the retry after a publish attempt whose outcome is unknown. Check the platform first — the post may already be live.
     */
    #[JsonProperty('force')]
    public ?bool $force;

    /**
     * @var ?DateTime $scheduledAt Future time to re-schedule the post for; omit to publish immediately.
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @param array{
     *   id: string,
     *   force?: ?bool,
     *   scheduledAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->force = $values['force'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
