<?php

namespace Schedulin\Profiles\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class CreateConnectLinkProfilesResponse extends JsonSerializableType
{
    /**
     * @var string $url Hosted page to send your client. No Schedulin login needed.
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var string $expiresAt
     */
    #[JsonProperty('expiresAt')]
    public string $expiresAt;

    /**
     * @param array{
     *   url: string,
     *   expiresAt: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
        $this->expiresAt = $values['expiresAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
