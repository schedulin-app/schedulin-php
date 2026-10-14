<?php

namespace Schedulin\Ideas\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;

class UpdateIdeasResponse extends JsonSerializableType
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
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var string $columnId
     */
    #[JsonProperty('columnId')]
    public string $columnId;

    /**
     * @var int $order Position within its column, 0 = top
     */
    #[JsonProperty('order')]
    public int $order;

    /**
     * @var ?DateTime $completedAt
     */
    #[JsonProperty('completedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $completedAt;

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
     *   columnId: string,
     *   order: int,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   description?: ?string,
     *   completedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->title = $values['title'];
        $this->description = $values['description'] ?? null;
        $this->columnId = $values['columnId'];
        $this->order = $values['order'];
        $this->completedAt = $values['completedAt'] ?? null;
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
