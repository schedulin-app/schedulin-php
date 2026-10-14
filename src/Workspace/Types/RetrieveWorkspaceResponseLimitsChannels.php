<?php

namespace Schedulin\Workspace\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class RetrieveWorkspaceResponseLimitsChannels extends JsonSerializableType
{
    /**
     * @var int $used Connected channels counting toward the limit
     */
    #[JsonProperty('used')]
    public int $used;

    /**
     * @var ?int $limit Channel limit of the plan; null means unlimited or no plan
     */
    #[JsonProperty('limit')]
    public ?int $limit;

    /**
     * @param array{
     *   used: int,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->used = $values['used'];
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
