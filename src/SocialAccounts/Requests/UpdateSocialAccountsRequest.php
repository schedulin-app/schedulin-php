<?php

namespace Schedulin\SocialAccounts\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\SocialAccounts\Types\UpdateSocialAccountsRequestPlatform;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;
use Schedulin\SocialAccounts\Types\UpdateSocialAccountsRequestImageProcessingStatus;
use Schedulin\Core\Types\ArrayType;
use Schedulin\SocialAccounts\Types\UpdateSocialAccountsRequestStatus;

class UpdateSocialAccountsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateSocialAccountsRequestPlatform> $platform
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
     * @var ?value-of<UpdateSocialAccountsRequestImageProcessingStatus> $imageProcessingStatus
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
     * @var ?value-of<UpdateSocialAccountsRequestStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   platform?: ?value-of<UpdateSocialAccountsRequestPlatform>,
     *   accessToken?: ?string,
     *   secretAccessToken?: ?string,
     *   refreshToken?: ?string,
     *   refreshTokenValid?: ?bool,
     *   tokenExpiresAt?: ?DateTime,
     *   imageUrl?: ?string,
     *   imageProcessingStatus?: ?value-of<UpdateSocialAccountsRequestImageProcessingStatus>,
     *   platformData?: ?array<string, mixed>,
     *   lastRefreshAt?: ?DateTime,
     *   status?: ?value-of<UpdateSocialAccountsRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
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
    }
}
