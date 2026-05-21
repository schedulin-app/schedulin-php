<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;
use Schedulin\Core\Types\ArrayType;

class SocialAccountUpdate extends JsonSerializableType
{
    /**
     * @var ?value-of<SocialAccountUpdatePlatform> $platform
     */
    #[JsonProperty('platform')]
    public ?string $platform;

    /**
     * @var ?string $accessToken
     */
    #[JsonProperty('accessToken')]
    public ?string $accessToken;

    /**
     * @var ?string $secretAccessToken
     */
    #[JsonProperty('secretAccessToken')]
    public ?string $secretAccessToken;

    /**
     * @var ?string $refreshToken
     */
    #[JsonProperty('refreshToken')]
    public ?string $refreshToken;

    /**
     * @var ?bool $refreshTokenValid
     */
    #[JsonProperty('refreshTokenValid')]
    public ?bool $refreshTokenValid;

    /**
     * @var ?DateTime $tokenExpiresAt
     */
    #[JsonProperty('tokenExpiresAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $tokenExpiresAt;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var ?value-of<SocialAccountUpdateImageProcessingStatus> $imageProcessingStatus
     */
    #[JsonProperty('imageProcessingStatus')]
    public ?string $imageProcessingStatus;

    /**
     * @var ?array<string, mixed> $platformData
     */
    #[JsonProperty('platformData'), ArrayType(['string' => 'mixed'])]
    public ?array $platformData;

    /**
     * @var ?DateTime $lastRefreshAt
     */
    #[JsonProperty('lastRefreshAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastRefreshAt;

    /**
     * @var ?value-of<SocialAccountUpdateStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @param array{
     *   id: string,
     *   platform?: ?value-of<SocialAccountUpdatePlatform>,
     *   accessToken?: ?string,
     *   secretAccessToken?: ?string,
     *   refreshToken?: ?string,
     *   refreshTokenValid?: ?bool,
     *   tokenExpiresAt?: ?DateTime,
     *   imageUrl?: ?string,
     *   imageProcessingStatus?: ?value-of<SocialAccountUpdateImageProcessingStatus>,
     *   platformData?: ?array<string, mixed>,
     *   lastRefreshAt?: ?DateTime,
     *   status?: ?value-of<SocialAccountUpdateStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->platform = $values['platform'] ?? null;
        $this->accessToken = $values['accessToken'] ?? null;
        $this->secretAccessToken = $values['secretAccessToken'] ?? null;
        $this->refreshToken = $values['refreshToken'] ?? null;
        $this->refreshTokenValid = $values['refreshTokenValid'] ?? null;
        $this->tokenExpiresAt = $values['tokenExpiresAt'] ?? null;
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->imageProcessingStatus = $values['imageProcessingStatus'] ?? null;
        $this->platformData = $values['platformData'] ?? null;
        $this->lastRefreshAt = $values['lastRefreshAt'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->id = $values['id'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
