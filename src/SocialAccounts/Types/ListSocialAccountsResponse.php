<?php

namespace Schedulin\SocialAccounts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListSocialAccountsResponse extends JsonSerializableType
{
    /**
     * @var array<ListSocialAccountsResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([ListSocialAccountsResponseDataItem::class])]
    public array $data;

    /**
     * @param array{
     *   data: array<ListSocialAccountsResponseDataItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
