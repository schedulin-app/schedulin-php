<?php

namespace Schedulin\SocialAccounts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListSlackChannelsSocialAccountsResponse extends JsonSerializableType
{
    /**
     * @var array<ListSlackChannelsSocialAccountsResponseItemsItem> $items
     */
    #[JsonProperty('items'), ArrayType([ListSlackChannelsSocialAccountsResponseItemsItem::class])]
    public array $items;

    /**
     * @param array{
     *   items: array<ListSlackChannelsSocialAccountsResponseItemsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->items = $values['items'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
