<?php

namespace Schedulin\SocialAccounts\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\SocialAccounts\Types\ReplaceQueueScheduleSocialAccountsRequestTimesItem;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ReplaceQueueScheduleSocialAccountsRequest extends JsonSerializableType
{
    /**
     * @var array<ReplaceQueueScheduleSocialAccountsRequestTimesItem> $times
     */
    #[JsonProperty('times'), ArrayType([ReplaceQueueScheduleSocialAccountsRequestTimesItem::class])]
    public array $times;

    /**
     * @param array{
     *   times: array<ReplaceQueueScheduleSocialAccountsRequestTimesItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->times = $values['times'];
    }
}
