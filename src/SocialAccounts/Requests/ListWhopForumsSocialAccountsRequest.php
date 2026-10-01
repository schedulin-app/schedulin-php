<?php

namespace Schedulin\SocialAccounts\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class ListWhopForumsSocialAccountsRequest extends JsonSerializableType
{
    /**
     * @var string $companyId
     */
    public string $companyId;

    /**
     * @param array{
     *   companyId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->companyId = $values['companyId'];
    }
}
