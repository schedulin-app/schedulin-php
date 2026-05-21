<?php

namespace Schedulin\Posts\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use DateTime;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\Date;

class PublishDraftPostsRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $scheduledAt
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @param array{
     *   scheduledAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scheduledAt = $values['scheduledAt'] ?? null;
    }
}
