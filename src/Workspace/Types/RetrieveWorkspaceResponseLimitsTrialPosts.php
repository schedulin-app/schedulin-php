<?php

namespace Schedulin\Workspace\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class RetrieveWorkspaceResponseLimitsTrialPosts extends JsonSerializableType
{
    /**
     * @var int $used
     */
    #[JsonProperty('used')]
    public int $used;

    /**
     * @var int $limit
     */
    #[JsonProperty('limit')]
    public int $limit;

    /**
     * @param array{
     *   used: int,
     *   limit: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->used = $values['used'];
        $this->limit = $values['limit'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
