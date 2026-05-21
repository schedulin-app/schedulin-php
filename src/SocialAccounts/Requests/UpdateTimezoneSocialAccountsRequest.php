<?php

namespace Schedulin\SocialAccounts\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class UpdateTimezoneSocialAccountsRequest extends JsonSerializableType
{
    /**
     * @var string $timezone
     */
    #[JsonProperty('timezone')]
    public string $timezone;

    /**
     * @param array{
     *   timezone: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->timezone = $values['timezone'];
    }
}
