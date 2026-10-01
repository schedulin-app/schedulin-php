<?php

namespace Schedulin\Webhooks\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Webhooks\Types\CreateWebhooksRequestEventsItem;
use Schedulin\Core\Types\ArrayType;

class CreateWebhooksRequest extends JsonSerializableType
{
    /**
     * @var string $url
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var array<value-of<CreateWebhooksRequestEventsItem>> $events
     */
    #[JsonProperty('events'), ArrayType(['string'])]
    public array $events;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @param array{
     *   url: string,
     *   events: array<value-of<CreateWebhooksRequestEventsItem>>,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
        $this->events = $values['events'];
        $this->description = $values['description'] ?? null;
    }
}
