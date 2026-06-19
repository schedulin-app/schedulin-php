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
     * @param array{
     *   status?: ?value-of<UpdateSocialAccountsRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
    }
}
