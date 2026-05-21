<?php

namespace Schedulin\Media\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Union;

class ListMediaRequestCursor extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var (
     *    DateTime
     *   |string
     * ) $updatedAt
     */
    #[JsonProperty('updatedAt'), Union('datetime', 'string')]
    public DateTime|string $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   updatedAt: (
     *    DateTime
     *   |string
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
