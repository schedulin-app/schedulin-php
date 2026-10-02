<?php

namespace Schedulin\SocialAccounts\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class DeleteSocialAccountsRequest extends JsonSerializableType
{
    /**
     * @var ?bool $permanent
     */
    public ?bool $permanent;

    /**
     * @param array{
     *   permanent?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->permanent = $values['permanent'] ?? null;
    }
}
