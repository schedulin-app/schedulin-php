<?php

namespace Schedulin\SocialAccounts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;

class ListSocialAccountsResponseItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<ListSocialAccountsResponseItemPlatform> $platform
     */
    #[JsonProperty('platform')]
    public string $platform;

    /**
     * @var value-of<ListSocialAccountsResponseItemStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $username
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @var ?string $displayName
     */
    #[JsonProperty('displayName')]
    public ?string $displayName;

    /**
     * @var ?string $profileImageUrl
     */
    #[JsonProperty('profileImageUrl')]
    public ?string $profileImageUrl;

    /**
     * @var bool $refreshTokenValid
     */
    #[JsonProperty('refreshTokenValid')]
    public bool $refreshTokenValid;

    /**
     * @var ?DateTime $analyticsDisabledAt
     */
    #[JsonProperty('analyticsDisabledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $analyticsDisabledAt;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   platform: value-of<ListSocialAccountsResponseItemPlatform>,
     *   status: value-of<ListSocialAccountsResponseItemStatus>,
     *   refreshTokenValid: bool,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   username?: ?string,
     *   displayName?: ?string,
     *   profileImageUrl?: ?string,
     *   analyticsDisabledAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->platform = $values['platform'];
        $this->status = $values['status'];
        $this->username = $values['username'] ?? null;
        $this->displayName = $values['displayName'] ?? null;
        $this->profileImageUrl = $values['profileImageUrl'] ?? null;
        $this->refreshTokenValid = $values['refreshTokenValid'];
        $this->analyticsDisabledAt = $values['analyticsDisabledAt'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
