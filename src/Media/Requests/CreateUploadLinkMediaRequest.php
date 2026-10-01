<?php

namespace Schedulin\Media\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class CreateUploadLinkMediaRequest extends JsonSerializableType
{
    /**
     * @var ?int $expiresInHours
     */
    #[JsonProperty('expiresInHours')]
    public ?int $expiresInHours;

    /**
     * @param array{
     *   expiresInHours?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->expiresInHours = $values['expiresInHours'] ?? null;
    }
}
