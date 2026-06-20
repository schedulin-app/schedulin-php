<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class PostSearch extends JsonSerializableType
{
    /**
     * @var ?int $page
     */
    #[JsonProperty('page')]
    public ?int $page;

    /**
     * @var ?value-of<PostSearchStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?array<value-of<PostSearchStatusesItem>> $statuses
     */
    #[JsonProperty('statuses'), ArrayType(['string'])]
    public ?array $statuses;

    /**
     * @var ?value-of<PostSearchApprovalStatus> $approvalStatus
     */
    #[JsonProperty('approvalStatus')]
    public ?string $approvalStatus;

    /**
     * @var ?PostSearchScheduledAt $scheduledAt
     */
    #[JsonProperty('scheduledAt')]
    public ?PostSearchScheduledAt $scheduledAt;

    /**
     * @var ?array<string> $tagIds
     */
    #[JsonProperty('tagIds'), ArrayType(['string'])]
    public ?array $tagIds;

    /**
     * @var ?value-of<PostSearchTagMode> $tagMode
     */
    #[JsonProperty('tagMode')]
    public ?string $tagMode;

    /**
     * @var ?array<string> $socialAccountIds
     */
    #[JsonProperty('socialAccountIds'), ArrayType(['string'])]
    public ?array $socialAccountIds;

    /**
     * @var ?float $limit
     */
    #[JsonProperty('limit')]
    public ?float $limit;

    /**
     * @param array{
     *   page?: ?int,
     *   status?: ?value-of<PostSearchStatus>,
     *   statuses?: ?array<value-of<PostSearchStatusesItem>>,
     *   approvalStatus?: ?value-of<PostSearchApprovalStatus>,
     *   scheduledAt?: ?PostSearchScheduledAt,
     *   tagIds?: ?array<string>,
     *   tagMode?: ?value-of<PostSearchTagMode>,
     *   socialAccountIds?: ?array<string>,
     *   limit?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->statuses = $values['statuses'] ?? null;
        $this->approvalStatus = $values['approvalStatus'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->tagIds = $values['tagIds'] ?? null;
        $this->tagMode = $values['tagMode'] ?? null;
        $this->socialAccountIds = $values['socialAccountIds'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
