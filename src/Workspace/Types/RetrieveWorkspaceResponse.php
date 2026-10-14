<?php

namespace Schedulin\Workspace\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;

class RetrieveWorkspaceResponse extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $slug
     */
    #[JsonProperty('slug')]
    public ?string $slug;

    /**
     * @var ?string $logo
     */
    #[JsonProperty('logo')]
    public ?string $logo;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var bool $requireApproval When true, posts written by Members are held for approval before they publish
     */
    #[JsonProperty('requireApproval')]
    public bool $requireApproval;

    /**
     * @var ?string $role The caller's role in this workspace (owner, admin or member)
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @var int $memberCount
     */
    #[JsonProperty('memberCount')]
    public int $memberCount;

    /**
     * @var RetrieveWorkspaceResponsePlan $plan
     */
    #[JsonProperty('plan')]
    public RetrieveWorkspaceResponsePlan $plan;

    /**
     * @var RetrieveWorkspaceResponseLimits $limits
     */
    #[JsonProperty('limits')]
    public RetrieveWorkspaceResponseLimits $limits;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   createdAt: DateTime,
     *   requireApproval: bool,
     *   memberCount: int,
     *   plan: RetrieveWorkspaceResponsePlan,
     *   limits: RetrieveWorkspaceResponseLimits,
     *   slug?: ?string,
     *   logo?: ?string,
     *   role?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->slug = $values['slug'] ?? null;
        $this->logo = $values['logo'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->requireApproval = $values['requireApproval'];
        $this->role = $values['role'] ?? null;
        $this->memberCount = $values['memberCount'];
        $this->plan = $values['plan'];
        $this->limits = $values['limits'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
