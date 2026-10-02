<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;
use DateTime;
use Schedulin\Core\Types\Date;

class WebhookDelivery extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $endpointId
     */
    #[JsonProperty('endpointId')]
    public string $endpointId;

    /**
     * @var string $event
     */
    #[JsonProperty('event')]
    public string $event;

    /**
     * @var array<string, mixed> $payload
     */
    #[JsonProperty('payload'), ArrayType(['string' => 'mixed'])]
    public array $payload;

    /**
     * @var value-of<WebhookDeliveryStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var int $attempts
     */
    #[JsonProperty('attempts')]
    public int $attempts;

    /**
     * @var ?int $responseStatus
     */
    #[JsonProperty('responseStatus')]
    public ?int $responseStatus;

    /**
     * @var ?string $lastError
     */
    #[JsonProperty('lastError')]
    public ?string $lastError;

    /**
     * @var ?DateTime $deliveredAt
     */
    #[JsonProperty('deliveredAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $deliveredAt;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @param array{
     *   id: string,
     *   endpointId: string,
     *   event: string,
     *   payload: array<string, mixed>,
     *   status: value-of<WebhookDeliveryStatus>,
     *   attempts: int,
     *   createdAt: DateTime,
     *   responseStatus?: ?int,
     *   lastError?: ?string,
     *   deliveredAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->endpointId = $values['endpointId'];
        $this->event = $values['event'];
        $this->payload = $values['payload'];
        $this->status = $values['status'];
        $this->attempts = $values['attempts'];
        $this->responseStatus = $values['responseStatus'] ?? null;
        $this->lastError = $values['lastError'] ?? null;
        $this->deliveredAt = $values['deliveredAt'] ?? null;
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
