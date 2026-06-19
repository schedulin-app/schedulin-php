<?php

namespace Schedulin\SocialAccounts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class PinterestBoardsSocialAccountsResponseDataItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?value-of<PinterestBoardsSocialAccountsResponseDataItemPrivacy> $privacy
     */
    #[JsonProperty('privacy')]
    public ?string $privacy;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   privacy?: ?value-of<PinterestBoardsSocialAccountsResponseDataItemPrivacy>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->privacy = $values['privacy'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
