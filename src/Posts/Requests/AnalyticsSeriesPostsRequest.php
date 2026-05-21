<?php

namespace Schedulin\Posts\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class AnalyticsSeriesPostsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @param array{
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
    }
}
