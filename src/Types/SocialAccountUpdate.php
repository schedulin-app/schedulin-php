<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class SocialAccountUpdate extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?value-of<SocialAccountUpdateStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $profileId Move the account into a client profile (profile id or externalId), or null to remove it from its profile.
     */
    #[JsonProperty('profileId')]
    public ?string $profileId;

    /**
     * @param array{
     *   id: string,
     *   status?: ?value-of<SocialAccountUpdateStatus>,
     *   profileId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->status = $values['status'] ?? null;
        $this->profileId = $values['profileId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
