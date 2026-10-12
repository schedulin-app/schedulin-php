<?php

namespace Schedulin\Posts\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;

class RetryPostsRequest extends JsonSerializableType
{
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
     *   force?: ?bool,
     *   scheduledAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->force = $values['force'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
    }
}
