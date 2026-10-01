<?php

namespace Schedulin\SocialAccounts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListWhopForumsSocialAccountsResponse extends JsonSerializableType
{
    /**
     * @var array<ListWhopForumsSocialAccountsResponseItemsItem> $items
     */
    #[JsonProperty('items'), ArrayType([ListWhopForumsSocialAccountsResponseItemsItem::class])]
    public array $items;

    /**
     * @param array{
     *   items: array<ListWhopForumsSocialAccountsResponseItemsItem>,
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
