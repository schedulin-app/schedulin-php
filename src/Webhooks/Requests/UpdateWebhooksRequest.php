<?php

namespace Schedulin\Webhooks\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Webhooks\Types\UpdateWebhooksRequestEventsItem;
use Schedulin\Core\Types\ArrayType;

class UpdateWebhooksRequest extends JsonSerializableType
{
    /**
     * @var ?string $url
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?array<value-of<UpdateWebhooksRequestEventsItem>> $events
     */
    #[JsonProperty('events'), ArrayType(['string'])]
    public ?array $events;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @param array{
     *   url?: ?string,
     *   events?: ?array<value-of<UpdateWebhooksRequestEventsItem>>,
     *   description?: ?string,
     *   enabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->url = $values['url'] ?? null;
        $this->events = $values['events'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
    }
}
