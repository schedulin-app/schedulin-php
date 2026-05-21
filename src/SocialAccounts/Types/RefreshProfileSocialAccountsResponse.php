<?php

namespace Schedulin\SocialAccounts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class RefreshProfileSocialAccountsResponse extends JsonSerializableType
{
    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var ?string $username
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   success: bool,
     *   username?: ?string,
     *   imageUrl?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->success = $values['success'];
        $this->username = $values['username'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
