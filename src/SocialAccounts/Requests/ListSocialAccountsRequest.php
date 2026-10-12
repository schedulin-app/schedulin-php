<?php

namespace Schedulin\SocialAccounts\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class ListSocialAccountsRequest extends JsonSerializableType
{
    /**
     * @var ?string $profileId
     */
    public ?string $profileId;

    /**
     * @param array{
     *   profileId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->profileId = $values['profileId'] ?? null;
    }
}
