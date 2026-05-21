<?php

namespace Schedulin\Posts\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Posts\Types\ListPostsRequestCursor;
use Schedulin\Posts\Types\ListPostsRequestStatus;
use Schedulin\Types\ListPostsRequestScheduledAt;
use Schedulin\Posts\Types\ListPostsRequestTagMode;

class ListPostsRequest extends JsonSerializableType
{
    /**
     * @var ?ListPostsRequestCursor $cursor
     */
    public ?ListPostsRequestCursor $cursor;

    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?value-of<ListPostsRequestStatus> $status
     */
    public ?string $status;

    /**
     * @var ?ListPostsRequestScheduledAt $scheduledAt
     */
    public ?ListPostsRequestScheduledAt $scheduledAt;

    /**
     * @var ?array<string> $tagIds
     */
    public ?array $tagIds;

    /**
     * @var ?value-of<ListPostsRequestTagMode> $tagMode
     */
    public ?string $tagMode;

    /**
     * @var ?array<string> $socialAccountIds
     */
    public ?array $socialAccountIds;

    /**
     * @var ?float $limit
     */
    public ?float $limit;

    /**
     * @param array{
     *   cursor?: ?ListPostsRequestCursor,
     *   page?: ?int,
     *   status?: ?value-of<ListPostsRequestStatus>,
     *   scheduledAt?: ?ListPostsRequestScheduledAt,
     *   tagIds?: ?array<string>,
     *   tagMode?: ?value-of<ListPostsRequestTagMode>,
     *   socialAccountIds?: ?array<string>,
     *   limit?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->tagIds = $values['tagIds'] ?? null;
        $this->tagMode = $values['tagMode'] ?? null;
        $this->socialAccountIds = $values['socialAccountIds'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }
}
