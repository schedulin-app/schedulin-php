<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class CountByTabPostsResponse extends JsonSerializableType
{
    /**
     * @var int $queue
     */
    #[JsonProperty('queue')]
    public int $queue;

    /**
     * @var int $drafts
     */
    #[JsonProperty('drafts')]
    public int $drafts;

    /**
     * @var int $approvals
     */
    #[JsonProperty('approvals')]
    public int $approvals;

    /**
     * @var int $sent
     */
    #[JsonProperty('sent')]
    public int $sent;

    /**
     * @var int $failed
     */
    #[JsonProperty('failed')]
    public int $failed;

    /**
     * @param array{
     *   queue: int,
     *   drafts: int,
     *   approvals: int,
     *   sent: int,
     *   failed: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->queue = $values['queue'];
        $this->drafts = $values['drafts'];
        $this->approvals = $values['approvals'];
        $this->sent = $values['sent'];
        $this->failed = $values['failed'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
