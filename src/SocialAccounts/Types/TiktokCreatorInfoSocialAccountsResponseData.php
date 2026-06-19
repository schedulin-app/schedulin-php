<?php

namespace Schedulin\SocialAccounts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class TiktokCreatorInfoSocialAccountsResponseData extends JsonSerializableType
{
    /**
     * @var string $creatorAvatarUrl
     */
    #[JsonProperty('creator_avatar_url')]
    public string $creatorAvatarUrl;

    /**
     * @var string $creatorUsername
     */
    #[JsonProperty('creator_username')]
    public string $creatorUsername;

    /**
     * @var string $creatorNickname
     */
    #[JsonProperty('creator_nickname')]
    public string $creatorNickname;

    /**
     * @var array<string> $privacyLevelOptions
     */
    #[JsonProperty('privacy_level_options'), ArrayType(['string'])]
    public array $privacyLevelOptions;

    /**
     * @var bool $commentDisabled
     */
    #[JsonProperty('comment_disabled')]
    public bool $commentDisabled;

    /**
     * @var bool $duetDisabled
     */
    #[JsonProperty('duet_disabled')]
    public bool $duetDisabled;

    /**
     * @var bool $stitchDisabled
     */
    #[JsonProperty('stitch_disabled')]
    public bool $stitchDisabled;

    /**
     * @var float $maxVideoPostDurationSec
     */
    #[JsonProperty('max_video_post_duration_sec')]
    public float $maxVideoPostDurationSec;

    /**
     * @param array{
     *   creatorAvatarUrl: string,
     *   creatorUsername: string,
     *   creatorNickname: string,
     *   privacyLevelOptions: array<string>,
     *   commentDisabled: bool,
     *   duetDisabled: bool,
     *   stitchDisabled: bool,
     *   maxVideoPostDurationSec: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->creatorAvatarUrl = $values['creatorAvatarUrl'];
        $this->creatorUsername = $values['creatorUsername'];
        $this->creatorNickname = $values['creatorNickname'];
        $this->privacyLevelOptions = $values['privacyLevelOptions'];
        $this->commentDisabled = $values['commentDisabled'];
        $this->duetDisabled = $values['duetDisabled'];
        $this->stitchDisabled = $values['stitchDisabled'];
        $this->maxVideoPostDurationSec = $values['maxVideoPostDurationSec'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
