<?php

namespace Schedulin\SocialAccounts\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\SocialAccounts\Types\UpdateSocialAccountsRequestStatus;
use Schedulin\Core\Json\JsonProperty;

class UpdateSocialAccountsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateSocialAccountsRequestStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $profileId Move the account into a client profile (profile id or externalId), or null to remove it from its profile. Pro plan.
     */
    #[JsonProperty('profileId')]
    public ?string $profileId;

    /**
     * @param array{
     *   status?: ?value-of<UpdateSocialAccountsRequestStatus>,
     *   profileId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->profileId = $values['profileId'] ?? null;
    }
}
