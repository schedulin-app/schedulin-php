<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class SocialAccountPublic extends JsonSerializableType
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
     * @var ?string $username
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @var string $userId
     */
    #[JsonProperty('user_id')]
    public string $userId;

    /**
     * @var ?string $profilePhotoUrl
     */
    #[JsonProperty('profile_photo_url')]
    public ?string $profilePhotoUrl;

    /**
     * @var value-of<SocialAccountPublicStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $externalId
     */
    #[JsonProperty('external_id')]
    public ?string $externalId;

    /**
     * @param array{
     *   id: string,
     *   platform: value-of<SocialPlatform>,
     *   userId: string,
     *   status: value-of<SocialAccountPublicStatus>,
     *   username?: ?string,
     *   profilePhotoUrl?: ?string,
     *   externalId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->platform = $values['platform'];
        $this->username = $values['username'] ?? null;
        $this->userId = $values['userId'];
        $this->profilePhotoUrl = $values['profilePhotoUrl'] ?? null;
        $this->status = $values['status'];
        $this->externalId = $values['externalId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
