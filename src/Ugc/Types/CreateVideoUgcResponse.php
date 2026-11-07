<?php

namespace Schedulin\Ugc\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;

class CreateVideoUgcResponse extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    public string $title;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var int $costMicros
     */
    #[JsonProperty('costMicros')]
    public int $costMicros;

    /**
     * @var int $estimatedCostMicros
     */
    #[JsonProperty('estimatedCostMicros')]
    public int $estimatedCostMicros;

    /**
     * @var ?string $errorMessage
     */
    #[JsonProperty('errorMessage')]
    public ?string $errorMessage;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   title: string,
     *   status: string,
     *   costMicros: int,
     *   estimatedCostMicros: int,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   errorMessage?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->title = $values['title'];
        $this->status = $values['status'];
        $this->costMicros = $values['costMicros'];
        $this->estimatedCostMicros = $values['estimatedCostMicros'];
        $this->errorMessage = $values['errorMessage'] ?? null;
        $this->createdAt = $values['createdAt'];
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
