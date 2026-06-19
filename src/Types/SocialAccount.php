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
     *   imageProcessingStatus: value-of<ImageProcessingStatus>,
     *   status: value-of<SocialAccountStatus>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   refreshTokenValid: bool,
     *   imageUrl?: ?string,
     *   username?: ?string,
     *   disconnectedReason?: ?value-of<SocialAccountDisconnectedReason>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->platform = $values['platform'];
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->imageProcessingStatus = $values['imageProcessingStatus'];
        $this->username = $values['username'] ?? null;
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
