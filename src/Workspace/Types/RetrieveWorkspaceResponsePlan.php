<?php

namespace Schedulin\Workspace\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class RetrieveWorkspaceResponsePlan extends JsonSerializableType
{
    /**
     * @var ?string $id Active plan id, or null when the workspace has no active plan
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $status Subscription status, e.g. active, trialing, past_due, canceled
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var bool $active Whether the workspace has an active plan, which scheduling and publishing require
     */
    #[JsonProperty('active')]
    public bool $active;

    /**
     * @param array{
     *   active: bool,
     *   id?: ?string,
     *   name?: ?string,
     *   status?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->active = $values['active'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
