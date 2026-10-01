<?php

namespace Schedulin\SocialAccounts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListWhopCompaniesSocialAccountsResponse extends JsonSerializableType
{
    /**
     * @var array<ListWhopCompaniesSocialAccountsResponseItemsItem> $items
     */
    #[JsonProperty('items'), ArrayType([ListWhopCompaniesSocialAccountsResponseItemsItem::class])]
    public array $items;

    /**
     * @param array{
     *   items: array<ListWhopCompaniesSocialAccountsResponseItemsItem>,
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
