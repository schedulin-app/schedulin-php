<?php

namespace Schedulin\SocialAccounts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListDiscordChannelsSocialAccountsResponse extends JsonSerializableType
{
    /**
     * @var array<ListDiscordChannelsSocialAccountsResponseItemsItem> $items
     */
    #[JsonProperty('items'), ArrayType([ListDiscordChannelsSocialAccountsResponseItemsItem::class])]
    public array $items;

    /**
     * @param array{
     *   items: array<ListDiscordChannelsSocialAccountsResponseItemsItem>,
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
