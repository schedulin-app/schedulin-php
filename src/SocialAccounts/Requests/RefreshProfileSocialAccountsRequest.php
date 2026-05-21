<?php

namespace Schedulin\SocialAccounts\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class RefreshProfileSocialAccountsRequest extends JsonSerializableType
{
    /**
     * @param array{
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        unset($values);
    }
}
