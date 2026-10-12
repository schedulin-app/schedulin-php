<?php

namespace Schedulin\Profiles\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class CreateConnectLinkProfilesRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $platforms Platform slugs the client may connect (e.g. instagram, tiktok). Omit to offer every platform.
     */
    #[JsonProperty('platforms'), ArrayType(['string'])]
    public ?array $platforms;

    /**
     * @var ?int $expiresInHours How long the link works. Defaults to 72 hours, max 7 days.
     */
    #[JsonProperty('expiresInHours')]
    public ?int $expiresInHours;

    /**
     * @var ?string $redirectUrl Where the client's Done button takes them after connecting, e.g. back to your app.
     */
    #[JsonProperty('redirectUrl')]
    public ?string $redirectUrl;

    /**
     * @param array{
     *   platforms?: ?array<string>,
     *   expiresInHours?: ?int,
     *   redirectUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->platforms = $values['platforms'] ?? null;
        $this->expiresInHours = $values['expiresInHours'] ?? null;
        $this->redirectUrl = $values['redirectUrl'] ?? null;
    }
}
