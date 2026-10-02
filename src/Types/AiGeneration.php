<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use DateTime;
use Schedulin\Core\Types\Date;

class AiGeneration extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<AiGenerationStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $modelKey
     */
    #[JsonProperty('modelKey')]
    public string $modelKey;

    /**
     * @var string $prompt
     */
    #[JsonProperty('prompt')]
    public string $prompt;

    /**
     * @var ?string $imageUrl
     */
    #[JsonProperty('imageUrl')]
    public ?string $imageUrl;

    /**
     * @var ?string $resultUrl
     */
    #[JsonProperty('resultUrl')]
    public ?string $resultUrl;

    /**
     * @var ?int $width
     */
    #[JsonProperty('width')]
    public ?int $width;

    /**
     * @var ?int $height
     */
    #[JsonProperty('height')]
    public ?int $height;

    /**
     * @var ?int $durationSeconds
     */
    #[JsonProperty('durationSeconds')]
    public ?int $durationSeconds;

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
     *   type: string,
     *   status: value-of<AiGenerationStatus>,
     *   modelKey: string,
     *   prompt: string,
     *   costMicros: int,
     *   estimatedCostMicros: int,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   imageUrl?: ?string,
     *   resultUrl?: ?string,
     *   width?: ?int,
     *   height?: ?int,
     *   durationSeconds?: ?int,
     *   errorMessage?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->type = $values['type'];
        $this->status = $values['status'];
        $this->modelKey = $values['modelKey'];
        $this->prompt = $values['prompt'];
        $this->imageUrl = $values['imageUrl'] ?? null;
        $this->resultUrl = $values['resultUrl'] ?? null;
        $this->width = $values['width'] ?? null;
        $this->height = $values['height'] ?? null;
        $this->durationSeconds = $values['durationSeconds'] ?? null;
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
