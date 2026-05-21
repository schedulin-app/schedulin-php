<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;

class SocialAccount extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var value-of<SocialPlatform> $platform
     */
    #[JsonProperty('platform')]
    public string $platform;

    /**
     * @var string $accountId
     */
    #[JsonProperty('accountId')]
    public string $accountId;

    /**
     * @var string $scope
     */
    #[JsonProperty('scope')]
    public string $scope;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var value-of<ImageProcessingStatus> $imageProcessingStatus
     */
    #[JsonProperty('imageProcessingStatus')]
    public string $imageProcessingStatus;

    /**
     * @var ?string $username
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @var mixed $platformData
     */
    #[JsonProperty('platformData')]
    public mixed $platformData;

    /**
     * @var ?DateTime $tokenExpiresAt
     */
    #[JsonProperty('tokenExpiresAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $tokenExpiresAt;

    /**
     * @var string $userId
     */
    #[JsonProperty('userId')]
    public string $userId;

    /**
     * @var ?DateTime $lastRefreshAt
     */
    #[JsonProperty('lastRefreshAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastRefreshAt;

    /**
     * @var value-of<SocialAccountStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?value-of<SocialAccountDisconnectedReason> $disconnectedReason
     */
    #[JsonProperty('disconnectedReason')]
    public ?string $disconnectedReason;

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
     * @var bool $refreshTokenValid
     */
    #[JsonProperty('refreshTokenValid')]
    public bool $refreshTokenValid;

    /**
     * @param array{
     *   id: string,
     *   platform: value-of<SocialPlatform>,
     *   accountId: string,
     *   scope: string,
     *   imageProcessingStatus: value-of<ImageProcessingStatus>,
     *   userId: string,
     *   status: value-of<SocialAccountStatus>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   refreshTokenValid: bool,
     *   imageUrl?: ?string,
     *   username?: ?string,
     *   platformData?: mixed,
     *   tokenExpiresAt?: ?DateTime,
     *   lastRefreshAt?: ?DateTime,
     *   disconnectedReason?: ?value-of<SocialAccountDisconnectedReason>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->platform = $values['platform'];
        $this->accountId = $values['accountId'];
        $this->scope = $values['scope'];
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->imageProcessingStatus = $values['imageProcessingStatus'];
        $this->username = $values['username'] ?? null;
        $this->platformData = $values['platformData'] ?? null;
        $this->tokenExpiresAt = $values['tokenExpiresAt'] ?? null;
        $this->userId = $values['userId'];
        $this->lastRefreshAt = $values['lastRefreshAt'] ?? null;
        $this->status = $values['status'];
        $this->disconnectedReason = $values['disconnectedReason'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->refreshTokenValid = $values['refreshTokenValid'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
