<?php

namespace Schedulin\SocialAccounts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class TiktokCreatorInfoSocialAccountsResponse extends JsonSerializableType
{
    /**
     * @var TiktokCreatorInfoSocialAccountsResponseError $error
     */
    #[JsonProperty('error')]
    public TiktokCreatorInfoSocialAccountsResponseError $error;

    /**
     * @var TiktokCreatorInfoSocialAccountsResponseData $data
     */
    #[JsonProperty('data')]
    public TiktokCreatorInfoSocialAccountsResponseData $data;

    /**
     * @param array{
     *   error: TiktokCreatorInfoSocialAccountsResponseError,
     *   data: TiktokCreatorInfoSocialAccountsResponseData,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
        $this->data = $values['data'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
