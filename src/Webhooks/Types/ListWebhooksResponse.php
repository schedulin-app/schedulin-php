<?php

namespace Schedulin\Webhooks\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Types\WebhookEndpoint;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListWebhooksResponse extends JsonSerializableType
{
    /**
     * @var array<WebhookEndpoint> $data
     */
    #[JsonProperty('data'), ArrayType([WebhookEndpoint::class])]
    public array $data;

    /**
     * @param array{
     *   data: array<WebhookEndpoint>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->data = $values['data'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
