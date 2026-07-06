<?php

namespace Schedulin\SocialAccounts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use DateTime;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class NextSlotsSocialAccountsResponse extends JsonSerializableType
{
    /**
     * @var array<DateTime> $slots
     */
    #[JsonProperty('slots'), ArrayType(['datetime'])]
    public array $slots;

    /**
     * @param array{
     *   slots: array<DateTime>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->slots = $values['slots'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
