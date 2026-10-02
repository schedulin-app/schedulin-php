<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;
use DateTime;
use Schedulin\Core\Types\Date;

class WebhookEndpoint extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var string $secret
     */
    #[JsonProperty('secret')]
    public string $secret;

    /**
     * @var array<value-of<WebhookEndpointEventsItem>> $events
     */
    #[JsonProperty('events'), ArrayType(['string'])]
    public array $events;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var bool $enabled
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var int $consecutiveFailures
     */
    #[JsonProperty('consecutiveFailures')]
    public int $consecutiveFailures;

    /**
     * @var ?DateTime $lastSuccessAt
     */
    #[JsonProperty('lastSuccessAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSuccessAt;

    /**
     * @var ?DateTime $lastFailureAt
     */
    #[JsonProperty('lastFailureAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastFailureAt;

    /**
     * @var ?DateTime $disabledAt
     */
    #[JsonProperty('disabledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $disabledAt;

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
     *   url: string,
     *   secret: string,
     *   events: array<value-of<WebhookEndpointEventsItem>>,
     *   enabled: bool,
     *   consecutiveFailures: int,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   description?: ?string,
     *   lastSuccessAt?: ?DateTime,
     *   lastFailureAt?: ?DateTime,
     *   disabledAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->url = $values['url'];
        $this->secret = $values['secret'];
        $this->events = $values['events'];
        $this->description = $values['description'] ?? null;
        $this->enabled = $values['enabled'];
        $this->consecutiveFailures = $values['consecutiveFailures'];
        $this->lastSuccessAt = $values['lastSuccessAt'] ?? null;
        $this->lastFailureAt = $values['lastFailureAt'] ?? null;
        $this->disabledAt = $values['disabledAt'] ?? null;
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
